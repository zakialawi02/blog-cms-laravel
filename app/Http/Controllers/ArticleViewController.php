<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleView;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class ArticleViewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::withCount(['articleViews as total_views'])->get();

        return response()->json($articles);
    }

    public function getViewsLast6Months()
    {
        // Tentukan tanggal mulai 6 bulan yang lalu dari hari ini, dimulai dari hari pertama bulan tersebut
        $sixMonthsAgo = now()->subMonths(6)->startOfMonth();

        // Siapkan query dasar untuk mengambil data view
        $query = ArticleView::selectRaw('
        CONCAT(DATE(viewed_at), " ", IF(HOUR(viewed_at) < 12, "00:00", "12:00")) AS period,
        COUNT(*) AS view_count')
            ->where('viewed_at', '>=', $sixMonthsAgo);

        // Cek jika pengguna yang login bukan admin
        if (auth()->user()->role !== 'admin') {
            // Hanya mengambil view dari artikel yang dimiliki oleh pengguna
            $query->whereHas('article', function ($q) {
                $q->where('user_id', auth()->id());
            });
        }

        // Lanjutkan dengan grouping dan ordering
        $views = $query->groupBy('period')->orderBy('period', 'asc')->get();

        // Pastikan semua periode 12 jam terakhir 6 bulan termasuk hari ini terwakili dalam hasil
        $dateRange = new \DatePeriod(
            $sixMonthsAgo,
            new \DateInterval('PT12H'),
            now()
        );

        $viewsByPeriod = $views->mapWithKeys(function ($item) {
            return [$item->period => $item->view_count];
        });

        $result = [];
        foreach ($dateRange as $dateTime) {
            $periodFormatted = $dateTime->format('Y-m-d') . ' ' . ($dateTime->format('H') < 12 ? '00:00' : '12:00');
            $result[] = [
                'period' => $periodFormatted,
                'timestamp' => $dateTime->getTimestamp(), // Sertakan timestamp untuk setiap periode 12 jam
                'view_count' => $viewsByPeriod[$periodFormatted] ?? 0
            ];
        }

        return response()->json($result);
    }



    public function getArticleStats()
    {
        if (request()->ajax()) {
            if (request()->has('type') && request()->get('type') == "popular") {
                $articles = Article::has('articleViews')->withCount(['articleViews as total_views']);

                if (auth()->user()->role !== 'admin') {
                    $articles->where('user_id', auth()->id());
                }

                $articles = $articles->orderBy('total_views', 'desc')->take(25)->get();

                return DataTables::of($articles)
                    ->editColumn('published_at', function ($data) {
                        return $data->published_at ? $data->published_at->format("d M Y") : '-';
                    })
                    ->addColumn('action', function ($article) {
                        return '<a href="' . route('admin.posts.statsdetail', $article->slug) . '" class="btn btn-sm btn-primary"><i class="ri-search-eye-line"></i></a>';
                    })
                    ->rawColumns(['action'])
                    ->removeColumn(['category_id', 'id', 'user_id', 'updated_at', 'created_at'])
                    ->make(true);
            }

            if (request()->has('type') && request()->get('type') == "recent") {
                $articles = ArticleView::with('article')
                    ->orderBy('viewed_at', 'desc');

                if (auth()->user()->role !== 'admin') {
                    $articles->whereHas('article', function ($q) {
                        $q->where('user_id', auth()->id());
                    });
                }
                $articles = $articles->take(100)->get();

                return Datatables::of($articles)
                    ->editColumn('viewed_at', function ($data) {
                        return $data->viewed_at ? $data->viewed_at->format("d M Y H:i") : 'unknown';
                    })
                    ->addColumn('title', function ($data) {
                        return '<a href="' . route('admin.posts.statsdetail', $data->article->slug) . '">' . $data->article->title . '</a>';
                    })
                    ->addColumn('location', function ($data) {
                        return $data->code ? $data->code : 'unknown';
                    })
                    ->rawColumns(['title'])
                    ->removeColumn(['article_id', 'article', 'id'])
                    ->make(true);
            }
        }

        $data = [
            'title' => 'Post Statistics',
        ];

        return view('pages.back.posts.statView', compact('data',));
    }
    public function statsByLocation()
    {
        if (auth()->user()->role !== 'admin') {
            $articleIds = Article::where('user_id', auth()->id())->pluck('id');
            $views = ArticleView::whereIn('article_id', $articleIds)
                ->select('code', 'location', DB::raw('count(*) as total_views'))
                ->groupBy('code', 'location')
                ->orderBy('total_views', 'desc')
                ->get();
        } else {
            $views = ArticleView::select('code', 'location', DB::raw('count(*) as total_views'))
                ->groupBy('code', 'location')
                ->orderBy('total_views', 'desc')
                ->get();
        }
        $views = $views->map(function ($item) {
            $item->location = $item->location ? $item->location : 'Unknown';
            $item->code = $item->code ? $item->code : 'Unknown';
            return $item;
        });

        // Get total views
        $totalViews = $views->sum('total_views');

        $data = [
            'title' => 'Post Statistics By Country',
        ];

        return view('pages.back.posts.statByCountry', compact('data', 'views', 'totalViews'));
    }


    public function statsPerArticle($slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();

        if (auth()->user()->role !== 'admin' && auth()->id() !== $article->user_id) {
            abort(403);
        }

        $views = ArticleView::where('article_id', $article->id)
            ->selectRaw('COUNT(*) as views, location, code')
            ->groupBy(['location', 'code'])
            ->get();
        $views = $views->map(function ($item) {
            $item->location = $item->location ? $item->location : 'Unknown';
            $item->code = $item->code ? $item->code : 'Unknown';
            return $item;
        });
        $total_views = $views->sum('views');
        $article['total_views'] = $total_views;

        $data = [
            'title' => 'Post Statistics Detail',
        ];

        return view('pages.back.posts.statViewDetail', compact('data', 'article', 'views'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(article $article)
    {
        //
    }
}

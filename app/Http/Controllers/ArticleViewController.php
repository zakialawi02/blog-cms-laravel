<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleView;
use Illuminate\Http\Request;

class ArticleViewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::withCount('articleViews')->get();
        return response()->json($articles);
    }

    public function statsPerArticle()
    {
        $articles = Article::with(['articleViews' => function ($query) {
            $query->select('article_id', Article::raw('count(*) as total_views'))
                ->groupBy('article_id');
        }])->get();

        return response()->json($articles);
    }
    public function statsByLocation()
    {
        $stats = ArticleView::select('location', ArticleView::raw('count(*) as total_views'))
            ->groupBy('location')
            ->orderBy('total_views', 'desc')
            ->get();

        return response()->json($stats);
    }

    public function getArticleStats($slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();

        $views = ArticleView::where('article_id', $article->id)
            ->selectRaw('DATE(viewed_at) as date, COUNT(*) as views')
            ->groupBy('date')
            ->get();

        return response()->json([
            'article' => $article,
            'views' => $views
        ]);
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

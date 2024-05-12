<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use ipinfo\ipinfo\IPinfo;
use App\Models\ArticleView;
use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class ArticleController extends Controller
{
    protected function articlesMappingArray($articles)
    {
        $articles = $articles->map(function ($article) {
            if (empty($article->excerpt)) {
                $article->excerpt = strip_tags($article->content);
            }
            if (!empty($article->cover)) {
                $article->cover = asset("storage/drive/" . $article->user->username . "/img/" . $article->cover);
            }
            if (empty($article->cover)) {
                $article->cover = asset("assets/img/image-placeholder.png");
            }
            if (empty($article->category_id)) {
                $article->category_id = "Uncategorized";
            }
            return $article;
        });
        $articles->map(function ($article) {
            $article->excerpt = Str::limit($article->excerpt, 300);
        });
    }

    protected function getIpVisitor($ip)
    {
        $access_token = 'cdd7aa7e08e80d';
        $client = new IPinfo($access_token);
        $ip_address = $ip;
        $details = $client->getDetails($ip_address);
        $dataV = $details->all;
        return $dataV;
    }

    private function fetchArticles($search = null, $categories = null, $tag = null)
    {
        $query = Article::with('user', 'category', 'tags')
            ->where(['status' => 'published', ['published_at', '<', now()]])
            ->orderBy('published_at', 'desc');

        if ($categories) {
            $query = Category::where('slug', $categories)->firstOrFail();
            $query = $query->articles()
                ->with('user', 'category')
                ->where(['status' => 'published', ['published_at', '<', now()]]);
            if ($categories == 'uncategorized') {
                $query->whereNull('category_id');
            }
        }

        if ($tag) {
            $query->whereHas('tags', function ($query) use ($tag) {
                $query->where('slug', $tag);
            });
        }

        if ($search) {
            $query->where(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('content', 'like', '%' . $search . '%')
                    ->orWhere('excerpt', 'like', '%' . $search . '%')
                    ->orWhereHas('user', function ($query) use ($search) {
                        $query->where('name', 'like', '%' . $search . '%')
                            ->orWhere('username', 'like', '%' . $search . '%');
                    });
            });
        }

        return $query->paginate(11)->withQueryString();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $search = request()->query('search');
        $articles = $this->fetchArticles($search);

        $this->articlesMappingArray($articles);
        $featured = (!empty($articles) ?  $articles->shuffle()->take(5) : null);

        return view('pages.front.posts.posts', compact('articles', 'featured'));
    }

    /**
     * Retrieves articles by category.
     *
     * @param string $cat The slug of the category.
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException If the category is not found.
     */
    public function getArticlesByCategory($cat)
    {
        $search = request()->query('search');
        $articles = $this->fetchArticles($search, $cat);

        $this->articlesMappingArray($articles);

        return view('pages.front.posts.byCategories', compact('articles'));
    }

    public function getArticlesByTag($tag)
    {
        (Tag::where('slug', $tag)->firstOrFail());
        $search = request()->query('search');
        $articles = $this->fetchArticles($search, "", $tag);

        $this->articlesMappingArray($articles);

        return view('pages.front.posts.byTags', compact('articles'));
    }

    /**
     * Retrieves articles written by a specific user.
     *
     * @param string $username The username of the user.
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException If the user is not found.
     */
    public function getArticlesByUser($username)
    {
        $user = User::where('username', $username)->firstOrFail();
        $articles = $user->articles()
            ->with('user', 'category')
            ->where(['status' => 'published', ['published_at', '<', now()]])
            ->orderBy('published_at', 'desc')
            ->paginate(12)->withQueryString();
        $this->articlesMappingArray($articles);

        return view('pages.front.posts.byUsers', compact('articles'));
    }

    /**
     * Retrieves articles published in a specific year.
     *
     * @param int $year The year to filter articles.
     * @throws Exception If an error occurs while retrieving articles.
     */
    public function getArticlesByYear($year)
    {
        (!is_numeric($year)) ? abort(404) : $year;
        (strlen($year) != 4) ? abort(404) : $year;
        $articles = Article::with('user', 'category')
            ->whereYear('published_at', $year)
            ->where(['status' => 'published', ['published_at', '<', now()]])
            ->orderBy('published_at', 'desc')
            ->paginate(12)->withQueryString();
        $this->articlesMappingArray($articles);

        return view('pages.front.posts.byYear', compact('articles'));
    }

    /**
     * Retrieves articles for a specific month and year.
     *
     * @param int $year The year to filter articles.
     * @param int $month The month to filter articles.
     */
    public function getArticlesByMonth($year, $month)
    {
        (!is_numeric($year)) ? abort(404) : $year;
        (strlen($year) != 4) ? abort(404) : $year;
        (!is_numeric($month)) ? abort(404) : $month;
        (strlen($month) != 2) ? abort(404) : $month;
        ($month > 12 || $month < 1) ? abort(404) : $month;
        $articles = Article::with('user', 'category')
            ->whereYear('published_at', $year)
            ->whereMonth('published_at', $month)
            ->where(['status' => 'published', ['published_at', '<', now()]])
            ->orderBy('published_at', 'desc')
            ->paginate(12)->withQueryString();
        $this->articlesMappingArray($articles);

        return view('pages.front.posts.byMonth', compact('articles'));
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

    protected function saveVisitor($article_id, $ip)
    {
        $cacheKey = 'article-view:' . $article_id . ':' . $ip;
        $cacheDuration = 60 * 1; // Cache for 1 minutes
        if (!Cache::has($cacheKey)) {
            $dataIpVisitor = $this->getIpVisitor($ip);
            try {
                ArticleView::create([
                    'article_id' => $article_id,
                    'ip_address' => $ip,
                    'code' => array_key_exists('country', $dataIpVisitor) ? $dataIpVisitor['country'] : NULL,
                    'location' => array_key_exists('country_name', $dataIpVisitor) ? $dataIpVisitor['country_name'] : NULL,
                ]);

                Cache::put($cacheKey, true, $cacheDuration);
            } catch (\Throwable $th) {
                //throw $th;
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $year, $slug)
    {
        $article = Article::with('user', 'category', 'tags')
            ->where('slug', $slug)
            ->whereYear('published_at', $year)
            ->where('published_at', '<=', Carbon::now())
            ->firstOrFail();
        $article['cover'] = (!empty($article->cover) ? $article->cover = asset("storage/drive/" . $article->user->username . "/img/" . $article->cover) : $article->cover = asset("assets/img/image-placeholder.png"));
        // dd($article->cover);
        $categories = Category::all();
        // return response()->json($article);
        $this->saveVisitor($article->id, request()->ip());

        return view('pages.front.posts.single_post', compact('article', 'categories'));
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

    /**
     * Show the comment section.
     * Show form comments section component view for a single post
     * Ajax call/request
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function showCommentSection()
    {

        $user = Auth::user()->username ?? "guest";

        return view('components.front.commentSinglePost', compact('user'));
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Models\Article;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticlesController extends Controller
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

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Article::select('title', 'slug', 'excerpt', 'cover', 'category_id', 'published_at', 'status', 'created_at', 'updated_at', 'user_id')->with('user', 'category');

        if ($request->has("search") && $request->get("search") != "") {
            $query = $query->where(function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->get("search") . '%')
                    ->orWhere('content', 'like', '%' . $request->get("search") . '%')
                    ->orWhere('excerpt', 'like', '%' . $request->get("search") . '%');
            });
        }

        if ($request->has("status") && $request->get("status") != "" && $request->get("status") != "all") {
            $query = $query->where('status', $request->get("status"));
        }

        if ($request->has("category") && $request->get("category") != "" && $request->get("category") == "uncategorized") {
            $query = $query->whereNull('category_id');
        } elseif ($request->has("category") && $request->get("category") != "" && $request->get("category") != "all") {
            $query = $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->get("category"));
            });
        }

        if ($request->has("user") && $request->get("user") != "" && $request->get("user") != "all") {
            $query = $query->whereHas('user', function ($q) use ($request) {
                $q->where('username', $request->get("user"));
            });
        }

        $posts = $query->paginate(10);

        $this->articlesMappingArray($posts);

        return response()->json($posts);
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
    public function show(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
    }
}

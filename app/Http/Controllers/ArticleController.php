<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Models\Category;

use Illuminate\Http\Request;
use function Pest\Laravel\json;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::with('user', 'category')
            ->where('status', 'published')
            ->orderBy('published_at', 'desc')
            ->get();
        return response()->json($articles);
    }

    /**
     * Retrieves articles by category.
     *
     * @param string $slug The slug of the category.
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException If the category is not found.
     */
    public function getArticlesByCategory($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $articles = $category->articles()
            ->with('user', 'category')
            ->where('status', 'published')
            ->orderBy('published_at', 'desc')
            ->get();
        return response()->json($articles);
    }

    /**
     * Retrieves articles written by a specific user.
     *
     * @param string $uuid The UUID of the user.
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException If the user is not found.
     */
    public function getArticlesByUser($uuid)
    {
        $user = User::where('id', $uuid)->firstOrFail();
        $articles = $user->articles()
            ->with('user', 'category')
            ->where('status', 'published')
            ->orderBy('published_at', 'desc')
            ->get();
        return response()->json($articles);
    }

    /**
     * Retrieves articles published in a specific year.
     *
     * @param int $year The year to filter articles.
     * @throws Exception If an error occurs while retrieving articles.
     */
    public function getArticlesByYear($year)
    {
        $articles = Article::with('user', 'category')
            ->whereYear('published_at', $year)
            ->where('status', 'published')
            ->orderBy('published_at', 'desc')
            ->get();
        return response()->json($articles);
    }

    /**
     * Retrieves articles for a specific month and year.
     *
     * @param int $year The year to filter articles.
     * @param int $month The month to filter articles.
     */
    public function getArticlesByMonth($year, $month)
    {
        $articles = Article::with('user', 'category')
            ->whereYear('published_at', $year)
            ->whereMonth('published_at', $month)
            ->where('status', 'published')
            ->orderBy('published_at', 'desc')
            ->get();
        return response()->json($articles);
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
    public function show($year, $slug)
    {
        $article = Article::with('user', 'category')
            ->where('slug', $slug)
            ->whereYear('published_at', $year)
            ->firstOrFail();
        return response()->json($article);
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

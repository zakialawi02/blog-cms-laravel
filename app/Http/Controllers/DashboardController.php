<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Models\Comment;
use App\Models\ArticleView;
use App\Models\requestContributor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::user()->role == 'admin') {
            $allPosts = Article::all();
            $allPostsCount = $allPosts->count();
            $allPostsPublished = Article::where(['status' => 'published', ['published_at', '<', now()]])->count();
            $allComments = Comment::all();
            $allCommentsCount = $allComments->count();
            $totalUsers = User::count();
            $articleIds = $allPosts->where('user_id', auth()->id())->pluck('id');
            $posts = Article::where('user_id', Auth::id());
            $myPosts = $posts->count();
            $myPostsPublished = $posts->where(['status' => 'published', ['published_at', '<', now()]])->count();
            $myComments = $allComments->where('user_id', Auth::id())->count();
            $visitors = ArticleView::all()->count();

            return view('pages.back.dashboardAdmin', compact('myPosts', 'myPostsPublished', 'myComments', 'visitors', 'allPostsCount', 'allPostsPublished', 'allCommentsCount', 'totalUsers'));
        } elseif (Auth::user()->role == 'writer') {
            $articleIds = Article::where('user_id', auth()->id())->pluck('id');
            $posts = Article::where('user_id', Auth::id());
            $myPosts = $posts->count();
            $myPostsPublished = $posts->where(['status' => 'published', ['published_at', '<', now()]])->count();
            $myComments = Comment::where('user_id', Auth::id())->count();
            $visitors = ArticleView::whereIn('article_id', $articleIds)->count();

            return view('pages.back.dashboardWriter', compact('myPosts', 'myPostsPublished', 'myComments', 'visitors'));
        } else {
            $my = requestContributor::where('user_id', Auth::id())->latest('created_at')->first();
            $myComments = Comment::where('user_id', Auth::id())->count();
            // return response()->json($my);
            return view('pages.back.dashboardUser', compact('my', 'myComments'));
        }
    }
}

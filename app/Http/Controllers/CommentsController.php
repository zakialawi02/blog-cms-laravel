<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function myindex()
    {
        $myComments = Comment::with('article', 'user')->where('user_id', auth()->user()->id)->get();

        $data = [
            'title' => 'Your Comments',
        ];

        return view('pages.back.comments.myComments', compact('data', 'myComments'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = "";

        $data = [
            'title' => 'Comments',
        ];

        return view('pages.back.comments.comments', compact('data', 'comments'));
    }


    /**
     * Store a newly on writed commented article created resource in storage.
     * Ajax call/request
     *
     * @param Article $post The article being commented on
     * @throws \Exception If there is an issue creating the comment
     * @return \Illuminate\Http\JsonResponse Returns a JSON response indicating success
     */
    public function store(Article $post)
    {
        $this->validate(request(), [
            'comment' => 'required',
        ]);

        $article_id = $post->id;
        $user_id = auth()->user()->id;

        Comment::create([
            'article_id' => $article_id,
            'user_id' => $user_id,
            'content' => request('comment'),
        ]);

        return response()->json(['success' => 'Comment created successfully'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        Comment::where('id', $comment->id)->delete();

        return redirect()->route('admin.mycomments.index')->with('success', 'Comment deleted successfully');
    }

    /**
     * Display the comments for a specific article.
     * Show list of comments component view for the specified article
     * Ajax call/request
     *
     * @param Article $post The article for which to display comments
     * @return \Illuminate\View\View Returns the view with the comments for the specified article
     */
    public function showArticleComment(Article $post)
    {
        $comments = Comment::with('user', 'article')
            ->where('article_id', $post->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('components.front.commentsShowArticle', compact('comments'));
    }
}

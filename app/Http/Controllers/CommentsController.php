<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    /**
     * Display my comments listing of the resource.
     *
     * @throws \Exception If there is an issue retrieving the comments
     * @return \Illuminate\View\View Returns the view with the comments
     */
    public function myindex()
    {
        $myComments = Comment::with('article', 'user')
            ->where('user_id', auth()->user()->id)
            ->get();

        $data = [
            'title' => 'My Comments',
        ];

        return view('pages.back.comments.myComments', compact('data', 'myComments'));
    }

    /**
     * Display all listing of the resource.
     */
    public function index()
    {
        $comments = Comment::with('article', 'user')
            ->whereHas('article', function ($query) {
                $query->where('user_id', auth()->user()->id);
            })
            ->orderBy('created_at', 'desc')
            ->get();

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
        $parent_id = request('parent_id');
        $parent_id = $parent_id === null ? null : explode('comment_0212', $parent_id)[1];

        $user_id = auth()->user()->id;

        $comment = Comment::create([
            'article_id' => $article_id,
            'parent_id' => $parent_id,
            'user_id' => $user_id,
            'content' => request('comment'),
        ]);

        return response()->json(['success' => 'Comment created successfully', 'commentId' => "comment_0212" . $comment->id], 201);
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
     *
     * @param Comment $comment The comment to be deleted
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse Response indicating success or redirect
     */
    public function destroy(Comment $comment)
    {
        if (request()->ajax()) {
            Comment::where('id', $comment->id)->delete();

            return response()->json(['success' => 'Comment deleted successfully']);
        }

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
        $allComments = Comment::with('user', 'article')
            ->where('article_id', $post->id)
            ->orderBy('created_at', 'asc')
            ->get();

        $comments = $allComments->where('parent_id', NULL);
        $replies = $allComments->filter(function ($comment) use ($allComments) {
            return $comment->parent_id != NULL && $allComments->contains('id', $comment->parent_id);
        });

        return view('components.front.commentsShowArticle', compact('comments', 'replies'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'All Posts',
        ];
        $posts = Article::with('user', 'category')
            ->latest()
            ->get();
        return view('pages.back.posts.index', compact('posts', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'Create Post',
        ];
        return view('pages.back.posts.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  Article $post
     * @return \Illuminate\Http\Response
     */
    public function show(Article $post)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Article $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $post)
    {
        $data = [
            'title' => 'Edit Post',
        ];
        return view('pages.back.posts.edit', compact('post', 'data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Article $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $post)
    {
        Article::where('slug', $post->slug)->update([
            'title' => $request->title,
        ]);
        return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Article $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $post)
    {
        Article::where('slug', $post->slug)->delete();
        return redirect()->route('admin.posts.index');
    }
}

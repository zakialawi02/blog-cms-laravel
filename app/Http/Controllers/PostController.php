<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

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
        $posts = $posts->map(function ($post) {
            if (empty($post->category_id)) {
                $post->category_id = "Uncategorized";
            }
            return $post;
        });

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
        $categories = Category::all();

        return view('pages.back.posts.create', compact('categories', 'data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        $data = $request->validated();
        $user = auth()->user()->username ?? "shared";
        if ($request->hasFile('cover')) {
            $file = $request->file('cover');
            $filename = time() . '_' . Str::random(20) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/drive/' . $user . '/img', $filename);
            $path = asset('storage/drive/' . $user . '/img/' . $filename);
            $data['cover'] = $filename;
        }
        Article::create($data);

        return redirect()->route('admin.posts.index')->with('success', 'Post created successfully');
    }

    public function generateSlug(Request $request)
    {
        $slug = Str::slug($request->data);

        return response()->json(['slug' => $slug]);
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
        $categories = Category::all();

        return view('pages.back.posts.edit', compact('post', 'categories', 'data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Article $post
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, Article $post)
    {
        $data = $request->validated();
        $user = $post->user->username ?? "shared";
        if ($request->hasFile('cover')) {
            if ($post->cover) {
                Storage::delete('public/drive/' . $user . '/img/' . $post->cover);
            }
            $file = $request->file('cover');
            $filename = time() . '_' . Str::random(20) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/drive/' . $user . '/img', $filename);
            $path = asset('storage/drive/' . $user . '/img/' . $filename);
            $data['cover'] = $filename;
        } else {
            $data['cover'] = $post->cover;
        }
        Article::where('slug', $post->slug)->update($data);

        return redirect()->route('admin.posts.index')->with('success', 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Article $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $post)
    {
        $user = $post->user->username ?? "shared";
        if ($post->cover) {
            Storage::delete('public/drive/' . $user . '/img/' . $post->cover);
        }
        Article::where('slug', $post->slug)->delete();
        return redirect()->route('admin.posts.index')->with('success', 'Post deleted successfully');
    }
}

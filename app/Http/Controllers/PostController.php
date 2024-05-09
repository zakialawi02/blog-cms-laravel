<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = [
            'title' => 'All Posts',
        ];
        // get data posts via server side/API

        $users = User::orderBy('username', 'asc')->get();
        $categories = Category::orderBy('category', 'asc')->get();

        return view('pages.back.posts.index', compact('data', 'users', 'categories'));
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
     * Store and publish a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        $data = $request->validated();

        if ($request->has('publish')) {
            $data['status'] = 'published';
            if (empty($request->published_at)) {
                $data['published_at'] = now();
            }
        } elseif ($request->has('unpublish')) {
            $data['status'] = 'draft';
            $data['published_at'] = null;
        }

        if ($request->hasFile('cover')) {
            $user = auth()->user()->username ?? "shared";
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

        if ($request->has('publish')) {
            $data['status'] = 'published';
            if (empty($request->published_at)) {
                $data['published_at'] = now();
            }
        } elseif ($request->has('unpublish')) {
            $data['status'] = 'draft';
            $data['published_at'] = null;
        }

        if ($request->hasFile('cover')) {
            $user = $post->user->username ?? "shared";
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

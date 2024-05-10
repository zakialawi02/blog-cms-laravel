<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\TagRequest;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::latest()->get();

        $data = [
            'title' => 'Tags',
        ];

        return view('pages.back.tags.index', compact('data', 'tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'title' => 'Create New Tag',
        ];

        return view('pages.back.tags.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TagRequest $request)
    {
        $data = $request->validated();

        Tag::create($data);

        return redirect()->route('admin.tags.index')->with('success', 'Tag created successfully');
    }

    public function generateSlug(Request $request)
    {
        $slug = Str::slug($request->tag);

        return response()->json(['slug' => $slug]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tags)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        $data = [
            'title' => 'Edit Tag',
        ];

        return view('pages.back.tags.edit', compact('data', 'tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TagRequest $request, Tag $tag)
    {
        $data = $request->validated();

        Tag::where('slug', $tag->slug)->update($data);

        return redirect()->route('admin.tags.index')->with('success', 'Tag updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        Tag::where('slug', $tag->slug)->delete();

        return redirect()->route('admin.tags.index')->with('success', 'Tag deleted successfully');
    }
}

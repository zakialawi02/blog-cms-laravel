<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'title' => 'List Category',
        ];
        $categories = Category::latest()->get();

        return view('pages.back.categories.index', compact('categories', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'title' => 'Create Category',
        ];

        return view('pages.back.categories.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $request->all();
        $data['category'] = ucwords($request->category);
        $data['slug'] = Str::slug($request->slug);

        $validator = Validator::make($data, [
            'category' => 'required|min:3|unique:categories,category',
            'slug' => 'required|unique:categories,slug',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Category::create($data);

        return redirect()->route('admin.categories.index')->with('success', 'Category created successfully');
    }

    public function generateSlug(Request $request)
    {
        $slug = Str::slug($request->category);

        return response()->json(['slug' => $slug]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $data = [
            'title' => 'Edit Category',
        ];

        return view('pages.back.categories.edit', compact('category', 'data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $data = $request->all();
        $data['category'] = ucwords($request->category);
        $data['slug'] = Str::slug($request->slug);

        $validator = Validator::make($data, [
            'category' => 'required|min:3|unique:categories,category,' . $category->id,
            'slug' => 'required|unique:categories,slug,' . $category->id,
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        };

        Category::where('slug', $category->slug)->update($data);

        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        Category::where('slug', $category->slug)->delete();

        return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully');
    }
}

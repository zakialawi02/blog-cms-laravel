<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'title' => 'All Pages',
        ];

        $pages = Page::orderBy('title', 'asc')->get();

        return view('pages.back.pages.index', compact('data', 'pages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'title' => 'Create Page',
        ];

        return view('pages.back.pages.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:4',
            'description' => 'required|min:5',
            'slug' => 'required|unique:pages,slug',
            'template_id' => 'required',
        ]);

        $jsonFilePath = storage_path('app/public/grapesjs/template-default.json');
        $jsonContent = file_get_contents($jsonFilePath);

        $requestData = $request->all();
        $requestData['isFullWidth'] = $request->template_id ?? 1;
        $requestData['content'] = $jsonContent;

        $page = Page::create($requestData);

        return redirect()->route('admin.pages.index')->with('success', 'Page created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Page $page)
    {

        return view('pages.back.pages.show', compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Page $page)
    {
        $data = [
            'title' => 'Edit Page',
        ];

        return view('pages.back.pages.edit', compact('data', 'page'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function builder(Page $page)
    {
        return view('pages.back.pages.builder', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Page $page)
    {
        $request->validate([
            'title' => 'required|min:4',
            'description' => 'required|min:5',
            'slug' => 'required|unique:pages,slug,' . $page->id,
            'template_id' => 'required',
        ]);

        $request['isFullWidth'] = $request->template_id ?? 1;
        $page->update($request->all());

        return redirect()->route('admin.pages.index')->with('success', 'Page updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Page $page)
    {
        $page->delete();

        return redirect()->route('admin.pages.index')->with('success', 'Page deleted successfully');
    }

    public function loadProject($id)
    {
        $page = Page::findOrFail($id);
        return response()->json([
            'success' => true,
            'data' => json_decode($page->content),
            'message' => 'Success load page content'
        ]);
    }

    public function storeProject(Request $request, $id)
    {
        $page = Page::findOrFail($id);
        $page->update(['content' => json_encode($request->input('data'))]);

        return response()->json([
            'success' => true,
            'data' => null,
            'message' => 'Project stored successfully'
        ]);
    }
}

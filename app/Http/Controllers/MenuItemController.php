<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use Illuminate\Http\Request;

class MenuItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'title' => 'Nav Menu Settings',
        ];

        $menuItems = MenuItem::where('class', 'header')->where("parent_id", null)->orderBy('order')->get();
        $menuItems2 = MenuItem::where('class', 'footer-a')->orderBy('order')->get();
        $menuItems3 = MenuItem::where('class', 'footer-b')->orderBy('order')->get();
        $menuLinks = [
            'header' => $menuItems,
            'footer_a' => $menuItems2,
            'footer_b' => $menuItems3,
        ];

        return view('pages.back.navMenu.index', compact('data', 'menuLinks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'title' => 'Create Menu Item'
        ];

        $menuItems = MenuItem::whereNull('parent_id')->orderBy('order')->get();

        return view('pages.back.navMenu.create', compact('data', 'menuItems'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|string|max:255',
            'class' => 'nullable|exists:menu_items,class',
            'order' => 'required|integer',
            'parent_id' => 'nullable|exists:menu_items,id',
        ]);

        MenuItem::create($request->all());

        return redirect()->route('admin.menu-items.index')->with('success', 'Menu item created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(MenuItem $menuItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MenuItem $menuItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MenuItem $menuItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MenuItem $menuItem)
    {
        $menuItem->delete();

        return redirect()->route('admin.menu-items.index')->with('success', 'Menu item deleted successfully.');
    }
}

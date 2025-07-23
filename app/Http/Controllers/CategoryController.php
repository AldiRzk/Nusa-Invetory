<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::all();
        return view('home.category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('home.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable|regex:/^[a-zA-Z0-9]+$/',
        ]);

        Category::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        return redirect('/category')->with('success', 'Category has been successfully created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find($id);
        return view('home.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable|regex:/^[a-zA-Z0-9]+$/',
        ]);
        Category::find($id)->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        return redirect('/category')->with('scucces', 'Category has been successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::find($id)->delete();
        return redirect('/category')->with('success', 'Category has been successfully deleted');
    }
}

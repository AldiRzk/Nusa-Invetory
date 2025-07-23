<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::all();
        return view('home.product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();
        return view('home.product.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'code' => 'required',
            'description' => 'nullable',
            'unit' => 'required',
            'stock' => 'required|integer|regex:/^[a-zA-Z0-9]+$/',
            'price' => 'required',
        ]);

        Product::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'code' => $request->code,
            'description' => $request->description,
            'unit' => $request->unit,
            'stock' => $request->stock,
            'price' => $request->price
        ]);

        return redirect('/product')->with('success', 'Product has been successfully created');
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
        $category = Category::all();
        $product = Product::find($id);
        return view('home.product.edit', compact('product', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'code' => 'required',
            'description' => 'nullable',
            'unit' => 'required',
            'stock' => 'required|integer|regex:/^[a-zA-Z0-9]+$/',
            'price' => 'required',
        ]);

        Product::find($id)->update([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'code' => $request->code,
            'description' => $request->description,
            'unit' => $request->unit,
            'stock' => $request->stock,
            'price' => $request->price
        ]);

        return redirect('/product')->with('success', 'Product has been successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::find($id)->delete();
        return redirect('/product')->with('success', 'Product has been successfully deleted');
    }
}

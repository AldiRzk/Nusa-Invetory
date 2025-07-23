<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $supplier = Supplier::all();
        return view('home.supplier.index', compact('supplier'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('home.supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric',
            'email' => 'required|email|unique:suppliers,email',
            'address' => 'required|regex:/^[a-zA-Z0-9]+$/'
        ]);

        Supplier::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address
        ]);

        return redirect('/supplier')->with('success', 'Supplier has been successfully created');
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
        $supplier = Supplier::find($id);
        return view('home.supplier.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $supplier =  Supplier::find($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric',
            'email' => 'required|email', 'unique:suppliers,email'. $supplier->id,
            'address' => 'required|regex:/^[a-zA-Z0-9]+$/'
        ]);

        Supplier::find($id)->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address
        ]);

        return redirect('/supplier')->with('success', 'Supplier has been successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Supplier::find($id)->delete();
        return redirect('/supplier')->with('success', 'Supplier has been successfully deleted');
    }
}

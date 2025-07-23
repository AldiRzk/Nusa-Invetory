<?php

namespace App\Http\Controllers;

use App\Exports\SaleExport;
use App\Models\Product;
use App\Models\Sale;
use App\Models\Sale_item;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sale = Sale::all();
        return view('home.sale.index', compact('sale'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::all();
        return view('home.sale.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'nullable|regex:/^[a-zA-Z0-9]+$/',
            'notes' => 'nullable|regex:/^[a-zA-Z0-9]+$/'
        ]);

        $sale = Sale::create([
            'user_id' => Auth::id(),
            'customer_name' => $request->customer_name ?: 'No Name',
            'date' => now(),
            'total_amounts' => 0,
            'notes' => $request->notes ?: 'No Description',
        ]);
        return redirect('/sale-items/' . $sale->id)->with('success', 'Sale has been successfully created');
    }

    /**
     * Display the specified resource.
     */
    public function receipt(string $id)
    {
        $sale = Sale::with(['items.product'])->findOrFail($id);
        return view('home.sale.receipt_sales', compact('sale'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function additems(string $id)
    {
        $sale = Sale::with(['items.product'])->find($id);
        $products = Product::all();
        return view('home.sale.sale_item', compact('sale', 'products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function storeitems(Request $request, string $id)
    {
        $request->validate([
            'sale_id' => 'required|exists:sales,id',
            'product_id'  => 'required|exists:products,id',
            'quantity'    => 'required|integer|min:1',
            'price'       => 'required|numeric|min:0',
        ]);


        Sale_item::create([
            'sale_id' => $request->sale_id,
            'product_id'  => $request->product_id,
            'quantity'    => $request->quantity,
            'price'       => $request->price,
            'total'       => $request->quantity * $request->price,
        ]);

        $product = Product::find($request->product_id);
        $product->stock -= $request->quantity;
        $product->save();

        return redirect()->back()->with('success', 'Item added successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Sale_item::findOrFail($id);

        $product = Product::find($item->product_id);
        if ($product) {
            $product->stock += $item->quantity;
            $product->stock = max($product->stock, 0); // supaya gak minus
            $product->save();
        }

        $item->delete();

        return redirect()->back()->with('success', 'Item deleted successfully.');
    }

    public function total_amounts(Request $request, string $id)
    {
        $sale = Sale::find($id);
        $sale->total_amounts = $request->total_amounts;
        $sale->save();
        return redirect('/sale/' . $sale->id . '/print-receipt')->with('success', 'Successful payment');
    }
    public function report()
    {
        $now_month = Carbon::now()->translatedFormat('F');
        $name_file = 'Sale '. $now_month. '.xlsx';
        return Excel::download(new SaleExport, $name_file);
    }
}

<?php

namespace App\Http\Controllers;

use App\Exports\PurchasesExport;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Purchase_item;
use App\Models\Supplier;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $purchase = Purchase::all();
        $supplier = Supplier::all();
        return view('home.purchase.index', compact('purchase', 'supplier'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::all();
        $supplier = Supplier::all();
        return view('home.purchase.create', compact('user', 'supplier'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'supplier_id' => 'required',
            'notes' => 'nullable|regex:/^[a-zA-Z0-9]+$/',
        ]);

        $purchase = Purchase::create([
            'user_id' => Auth::id(),
            'supplier_id' => $request->supplier_id,
            'date' => now(),
            'total_amounts' => 0,
            'notes' => $request->notes,
        ]);
        return redirect('/purchase-items/'. $purchase->id)->with('success', 'Purchase has been successfully created');
    }

    /**
     * Display the specified resource.
     */
    public function receipt(string $id)
    {
        $purchase = Purchase::with(['items.product'])->findOrFail($id);
        return view('home.purchase.receipt_purchase', compact('purchase'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function additems(string $id)
    {
        $purchase = Purchase::with(['items.product'])->find($id);
        $products = Product::all();
        return view('home.purchase.purchase_item', compact('purchase', 'products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function storeitems(Request $request, string $id)
    {
        $request->validate([
            'purchase_id' => 'required|exists:purchases,id',
            'product_id'  => 'required|exists:products,id',
            'quantity'    => 'required|integer|min:1',
            'price'       => 'required|numeric|min:0',
        ]);


        Purchase_item::create([
            'purchase_id' => $request->purchase_id,
            'product_id'  => $request->product_id,
            'quantity'    => $request->quantity,
            'price'       => $request->price,
            'total'       => $request->quantity * $request->price,
        ]);

        $product = Product::find($request->product_id);
        $product->stock += $request->quantity;
        $product->save();

        return redirect()->back()->with('success', 'Item added successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Purchase_item::findOrFail($id);

        $product = Product::find($item->product_id);
        if ($product) {
            $product->stock -= $item->quantity;
            $product->stock = max($product->stock, 0); // supaya gak minus
            $product->save();
        }

        $item->delete();

        return redirect()->back()->with('success', 'Item deleted successfully.');
    }

    public function total_amounts(Request $request, string $id){
        $purchase = Purchase::find($id);
        $purchase->total_amounts = $request->total_amounts;
        $purchase->save();
        return redirect('/purchase/'. $purchase->id .'/print-receipt')->with('success', 'Successful payment');
    }
    public function report()
    {
        $now_month = Carbon::now()->translatedFormat('F');
        $name_file = 'Purchases '. $now_month. '.xlsx';
        return Excel::download(new PurchasesExport, $name_file);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Purchase;
use App\Models\Sale;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tabel_purchase = Purchase::query()->whereDate('date',Carbon::today())->get();
        $tabel_sale = Sale::query()->whereDate('date',Carbon::today())->get();
        $total_sale = Sale::count('id');
        $total_purchase = Purchase::count('id');
        $total_product = Product::count('id');
        $income = Sale::query()->whereDate('date', Carbon::today())->sum('total_amounts');
        return view('home.dashboard', compact('income','total_sale','total_purchase','total_product','tabel_purchase','tabel_sale'));
    }
}

<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Role;
use App\Models\Categorie;
use Illuminate\Support\Facades\Route;


Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/actionlogin', [LoginController::class, 'actionLogin'])->name('actionlogin');
Route::get('/logout', [LoginController::class, 'actionLogout'])->name('actionlogout');

Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index']);

    //User Controller
    Route::get('/user', [UserController::class, 'index'])->middleware(Role::class);
    Route::get('/user/create', [UserController::class, 'create'])->middleware(Role::class);
    Route::post('/user/store', [UserController::class, 'store'])->middleware(Role::class);
    Route::get('/user/{id}/edit', [UserController::class, 'edit'])->middleware(Role::class);
    Route::post('/user/{id}/update', [UserController::class, 'update'])->middleware(Role::class);
    Route::get('/user/{id}/destroy', [UserController::class, 'destroy'])->middleware(Role::class);

    //Category Controller
    Route::get('/category', [CategoryController::class, 'index']);
    Route::get('/category/create', [CategoryController::class, 'create']);
    Route::post('/category/store', [CategoryController::class, 'store']);
    Route::get('/category/{id}/edit', [CategoryController::class, 'edit']);
    Route::post('/category/{id}/update', [CategoryController::class, 'update']);
    Route::get('/category/{id}/destroy', [CategoryController::class, 'destroy']);

    //Product Controller
    Route::get('/product', [ProductController::class, 'index']);
    Route::get('/product/create', [ProductController::class, 'create']);
    Route::post('/product/store', [ProductController::class, 'store']);
    Route::get('/product/{id}/edit', [ProductController::class, 'edit']);
    Route::post('/product/{id}/update', [ProductController::class, 'update']);
    Route::get('/product/{id}/destroy', [ProductController::class, 'destroy']);

    //Supplier Controller
    Route::get('/supplier', [SupplierController::class, 'index']);
    Route::get('/supplier/create', [SupplierController::class, 'create']);
    Route::post('/supplier/store', [SupplierController::class, 'store']);
    Route::get('/supplier/{id}/edit', [SupplierController::class, 'edit']);
    Route::post('/supplier/{id}/update', [SupplierController::class, 'update']);
    Route::get('/supplier/{id}/destroy', [SupplierController::class, 'destroy']);

    //Purchase Controller
    Route::get('/purchase', [PurchaseController::class, 'index']);
    Route::get('/purchase/create', [PurchaseController::class, 'create']);
    Route::post('/purchase/store', [PurchaseController::class, 'store']);
    Route::get('/purchase-items/{id}', [PurchaseController::class, 'additems']);
    Route::post('/purchase-items/{id}/store', [PurchaseController::class, 'storeitems']);
    Route::get('/purchase-items/{id}/delete', [PurchaseController::class, 'destroy']);
    Route::post('/purchase-items/{id}/total-amounts', [PurchaseController::class, 'total_amounts']);
    Route::get('/purchase/{id}/print-receipt', [PurchaseController::class, 'receipt']);
    Route::get('/purchase/report', [PurchaseController::class, 'report']);

    //Sale Controller
    Route::get('/sale', [SaleController::class, 'index']);
    Route::get('/sale/create', [SaleController::class, 'create']);
    Route::post('/sale/store', [SaleController::class, 'store']);
    Route::get('/sale-items/{id}', [SaleController::class, 'additems']);
    Route::post('/sale-items/{id}/store', [SaleController::class, 'storeitems']);
    Route::get('/sale-items/{id}/delete', [SaleController::class, 'destroy']);
    Route::post('/sale-items/{id}/total-amounts', [SaleController::class, 'total_amounts']);
    Route::get('/sale/{id}/print-receipt', [SaleController::class, 'receipt']);
    Route::get('/sale/report', [SaleController::class, 'report']);
});

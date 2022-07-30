<?php

use App\Http\Controllers\ProductController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::get('/dashboard/products', function () {
    $products = Product::wherevendor(auth()->id())->get();
    return view('products.dashboard')->with(compact('products'));
})->middleware(['auth'])->name('dash_products');



//Products Route
Route::get('/products', [ProductController::class,'index'])->name('products');
//Route::get('/fuckme', [ProductController::class,'dashboardProduct'])->middleware(['auth'])->name('dash_products');
Route::get('/products/create', [ProductController::class,'create'])->middleware(['auth'])->name('products-create');
Route::post('/products/store', [ProductController::class,'store'])->middleware(['auth'])->name('products-store');
Route::get('products/edit/{id}', [ProductController::class,'edit'])->middleware(['auth'])->name('products.edit');
Route::post('/products/update', [ProductController::class,'update'])->middleware(['auth'])->name('products.update');
require __DIR__.'/auth.php';

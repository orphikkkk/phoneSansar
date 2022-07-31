<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Models\Category;
use App\Models\Order;
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

Route::get('/', HomeController::class)->name('home');

Route::get('/dashboard', function () {
    $orders = Order::wherecustomer(auth()->id())->latest()->get();

    $dashDetails = [
      'orders'=> Order::count(),
      'products'=> Product::count(),
        'total'=> Order::all()->sum('total'),
        'buyers'=> \App\Models\User::whererole('buyer')->count(),
        'sellers'=> \App\Models\User::whererole('seller')->count()
    ];

    return view('dashboard')->with(compact('orders','dashDetails'));
})->middleware(['auth'])->name('dashboard');


Route::get('/dashboard/products', function () {
    $products = Product::wherevendor(auth()->id())->get();
    return view('products.dashboard')->with(compact('products'));
})->middleware(['auth'])->name('dash_products');

Route::get('/dashboard/categories', function () {
    $categories = Category::all();
    return view('categories.dashboard')->with(compact('categories'));
})->middleware(['auth'])->name('dash_categories');

//Products
Route::prefix('products')->name('products')->controller(ProductController::class)->group(function () {
    Route::get('','index');
    Route::get('/show/{id}', 'show')->middleware(['auth'])->name('.show');
    Route::get('/create', 'create')->middleware(['auth'])->name('.create');
    Route::post('/store','store')->middleware(['auth'])->name('.store');
    Route::get('/edit/{id}', 'edit')->middleware(['auth'])->name('.edit');
    Route::post('/update', 'update')->middleware(['auth'])->name('.update');
    Route::get('/destroy/{id}', 'destroy')->middleware(['auth'])->name('.destroy');
    Route::get('/search', 'search')->name('.search');
});

//Categories
Route::prefix('categories')->name('categories')->controller(CategoryController::class)->group(function () {
    Route::get('','index');
    Route::get('/show/{id}', 'show')->name('.show');
    Route::get('/create', 'create')->middleware(['auth'])->name('.create');
    Route::post('/store','store')->middleware(['auth'])->name('.store');
    Route::get('/edit/{id}', 'edit')->middleware(['auth'])->name('.edit');
    Route::post('/update', 'update')->middleware(['auth'])->name('.update');
    Route::get('/destroy/{id}', 'destroy')->middleware(['auth'])->name('.destroy');
});


//Cart
Route::get('/cart',[CartController::class,'index'])->middleware(['auth'])->name('cart');
Route::get('/cart/add/{id}',[CartController::class,'create'])->middleware(['auth'])->name('cart.add');
Route::get('/cart/delete/',[CartController::class,'destroy'])->middleware(['auth'])->name('cart.delete');


//Orders
Route::prefix('order')->name('orders')->controller(OrderController::class)->group(function () {
    Route::get('/index', 'index')->name('.index');
    Route::get('', 'create')->middleware(['auth']);
    Route::post('/store','store')->middleware(['auth'])->name('.store');
    Route::get('/edit/{id}', 'edit')->middleware(['auth'])->name('.edit');
    Route::post('/update', 'update')->middleware(['auth'])->name('.update');
    Route::get('/cancel/{id}', 'cancel')->middleware(['auth'])->name('.cancel');
    Route::get('/complete/{id}', 'complete')->middleware(['auth'])->name('.complete');
    Route::get('/sellerApprove/{id}', 'approve')->middleware(['auth'])->name('.approve');
    Route::get('/destroy/{id}', 'destroy')->middleware(['auth'])->name('.destroy');
});

require __DIR__.'/auth.php';

<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Models\Category;
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
    $products = Product::inRandomOrder()->limit(4)->get();
    return view('welcome')->with(compact('products'));
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
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
});

//Categories
Route::prefix('categories')->name('categories')->controller(CategoryController::class)->group(function () {
    Route::get('','index');
    Route::get('/show/{id}', 'show')->middleware(['auth'])->name('.show');
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


require __DIR__.'/auth.php';

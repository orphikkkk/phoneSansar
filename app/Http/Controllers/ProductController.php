<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use http\Env\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $products = Product::all();
            return view('Products.index')->with(compact('products'));
    }

    public function dashboardProduct()
    {
        $products = Product::all();
            return redirect(view('products.dashboard')->with(compact('products')));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('products.create')->with(compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required'],
            'price' => ['required']
        ]);
        $publish = ($request->pulish == 'on') ? 1 :0;
        $newProduct = new Product();
        if($request->hasFile('photo')){
            $request->validate([
                'photo' =>'image|mimes:jpeg,bmp,png,jpg'
            ]);
            $imageName = 'mov_'. Str::studly($request->get('name')) . '.' .$request->file('photo')->extension();
            $request->file('photo')->move(public_path('images/product'), $imageName);
            $newProduct->photo = $imageName;
        }

        $newProduct->name = $request->get('name');
        $newProduct->slug = Str::slug($request->get('name'));
        $newProduct->description = $request->get('description');
        $newProduct->price = $request->get('price');
        $newProduct->category_id = $request->get('brand');
        $newProduct->vendor = auth()->id();
        $newProduct->sku = $request->get('sku');
        $newProduct->published = $publish;
        $newProduct->save();

        return redirect('/dashboard/products');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($product)
    {
        $pro = Product::query()->whereid($product)->first();
        $cat = Category::all();
        return view('products.edit')->with(compact('pro','cat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request)
    {
        $publish = ($request->get('publish') == 'on') ? 1 : 0;
        $product = Product::query()->whereid($request->get('id'))->first();
            $product->name = $request->get('name');
            $product->slug = Str::slug($request->get('name'));
            $product->description = $request->get('description');
            $product->price = $request->get('price');
            $product->category_id = $request->get('brand');
            $product->vendor = auth()->id();
            $product->sku = $request->get('sku');
            $product->published = $publish;
        if($request->hasFile('photo')){
            $request->validate([
                'photo' =>'image|mimes:jpeg,bmp,png,jpg'
            ]);
            $imageName = 'pro_'. $request->get('name') . '.' .$request->file('photo')->extension();
            $request->file('photo')->move(public_path('images/product'), $imageName);
            $product->photo = $imageName;
        }
        $product->save();

        return redirect(url('/dashboard/products'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::whereid($id);
        $product->delete();

        return redirect(url('/dashboard/products'));
    }

    public function search(\Illuminate\Http\Request $request)
    {
        $products = Product::query()
        ->where('name','like','%'.$request->search.'%')
            ->get();
        return view('products.search')->with(compact('products'));
    }
}

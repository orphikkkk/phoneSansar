<?php

namespace App\Http\Controllers;

use App\Models\Product;

class HomeController extends Controller
{
    public function __invoke()
    {
        $products = Product::query()
            ->select(
                'products.id as id',
                'products.name as  name',
                'products.price as price',
                'products.photo as photo'
            )
            ->join('users','users.id','=','products.vendor')
            ->wherepublished(1)
            ->orderBy('users.rating','desc')
            ->limit(4)->get();
        return view('welcome')->with(compact('products'));
    }
}

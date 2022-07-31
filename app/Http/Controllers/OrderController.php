<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Cart;
use App\Models\Order;
use App\Models\User;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $cart = Cart::query()->whereuser_id(auth()->id())->first();
        if (!$cart)
            return back();
        $productDetails = json_decode($cart->session_value);
        return view('orders.create')->with(compact('productDetails'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {

        $name = $request->fname . ' ' . $request->lname;
        $cart = Cart::whereuser_id(auth()->id())->first();
        $productDetails = json_decode($cart->session_value);

        $newOrder = new Order();
            $newOrder->customer = auth()->id();
            $newOrder->total = $productDetails->price;
            $newOrder->line_items = $cart->session_value;
            $newOrder->billing_name = $name;
            $newOrder->billing_email = $request->email;
            $newOrder->billing_phone = $request->phone;
            $newOrder->billing_street = $request->address;
            $newOrder->billing_district = $request->district;
            $newOrder->status = 'processing';
        $newOrder->save();

        //Delete Cart Session
        $cart = Cart::whereuser_id(auth()->id());
        $cart->delete();

        return redirect('/dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
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
        $products = Product::query()->wherevendor(auth()->id())->pluck('id')->toArray();

        $orders = Order::query();
            if (auth()->user()->role == 'seller')
                $orders = $orders->whereIn('line_items->id',$products);
            $orders = $orders->latest()
            ->get();

        return view('orders.index')->with(compact('orders'));
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


        //Product Hide
        $product = Product::whereid($productDetails->id)->first();
            $product->published = 0;
        $product->save();

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

    public function cancel($id)
    {
        $order = Order::whereid($id)->first();
            $order->status = 'cancelled';
        $order->save();

        return back();
    }

    public function complete($id)
    {
        $order = Order::whereid($id)->first();
        $order->status = 'completed';
        $order->save();

        return back();
    }

    public function approve($id)
    {
        $order = Order::whereid($id)->first();
        $approve = ($order->seller_approve) ? 0 : 1;
        $order->seller_approve = $approve;
        $order->save();

        $session_value =json_decode($order->line_items);
        $id= $session_value->id;
        $vendorId = Product::whereid($id)->value('vendor');

        $user = User::whereid($vendorId)->increment('rating');

        return back();
    }

}

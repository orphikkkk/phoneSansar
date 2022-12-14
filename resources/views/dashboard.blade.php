<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        @if(auth()->user()->role != 'admin')
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <article class="border border-gray-200 bg-white shadow-sm rounded mb-5 p-3 lg:p-5">

                            <figure class="flex items-start sm:items-center">
                                <img class="w-16 rounded-full mr-4" src="{{asset('images/avatars/avatar.jpg')}}" alt="">
                                <figcaption>
                                    <h5 class="font-semibold text-lg">{{auth()->user()->name}}</h5>
                                    <p>
                                        Email: <a href="mailto:{{auth()->user()->email}}">{{auth()->user()->email}}</a>
                                        |
                                        Phone: <a href="tel:+9779861219495">+977986119495</a>
                                    </p>
                                </figcaption>
                            </figure>

                            <hr class="my-4">
                            <h3 class="text-xl font-semibold mb-5">Current orders</h3>
                            @foreach($orders as $ord)
                                <!-- item-order -->
                                <article class="p-3 lg:p-5 mb-5 bg-white border border-blue-600 rounded-md">
                                    <header class="lg:flex justify-between mb-4">
                                        <div class="mb-4 lg:mb-0">
                                            <p class="font-semibold">
                                                <span>Order ID: {{$ord->id}} </span>
                                                <span
                                                @class(
                                                    [
                                                        'text-green-500'=>$ord->status == 'completed',
                                                        'text-yellow-500'=>$ord->status == 'processing',
                                                        'text-red-500'=>$ord->status == 'cancelled',
                                                    ]
                                                )
                                            > ??? {{$ord->status}} </span>
                                            </p>
                                            <p class="text-gray-500"> {{$ord->created_at}} </p>
                                        </div>
                                        @if($ord->status != 'cancelled')
                                            <div>
                                                <a href="/order/cancel/{{$ord->id}}"
                                                   class="px-3 py-1 inline-block text-sm text-red-500 border border-gray-300 rounded-md hover:text-red-500 hover:border-red-600">
                                                    Cancel order
                                                </a>
                                                @if($ord->status == 'completed')
                                                    @if(!$ord->seller_approve)
                                                        <a href="/order/sellerApprove/{{$ord->id}}">
                                                    @endif
                                                        <i  @class([
                                                     "fa-solid fa-thumbs-up px-4 py-1 inline-block text-blue-600 border border-blue-600 bg-grey-600 rounded-md hover:text-white hover:bg-blue-700" => !$ord->seller_approve,
                                                     "fa-solid fa-thumbs-up px-4 py-1 inline-block text-white border border-blue-600 bg-blue-600 rounded-md" => $ord->seller_approve,
                                                     ])></i>
                                                    @if(!$ord->seller_approve)
                                                        </a>
                                                    @endif
                                                @endif
                                            </div>
                                        @endif
                                    </header>
                                    <div class="grid md:grid-cols-3 gap-2">
                                        <div>
                                            <p class="text-gray-400 mb-1">Buyer Information</p>
                                            <ul class="text-gray-600">
                                                <li>{{$ord->billing_name}}</li>
                                                <li>Phone: {{$ord->billing_phone}}</li>
                                                <li>Email: {{$ord->billing_email}}</li>
                                            </ul>
                                        </div>
                                        <div>
                                            <p class="text-gray-400 mb-1">Purchase Address</p>
                                            <ul class="text-gray-600">
                                                <li>{{$ord->billing_street}}</li>
                                                <li>{{$ord->billing_district}}, Nepal</li>
                                            </ul>
                                        </div>
                                        <div>
                                            <p class="text-gray-400 mb-1">Payment</p>
                                            <ul class="text-gray-600">
                                                <li>Total Fee: Rs. {{$ord->total}}</li>
                                            </ul>
                                        </div>
                                    </div> <!-- grid.// -->

                                    <hr class="my-4">

                                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-2">
                                        @php
                                            $productDetails = json_decode($ord->line_items);
                                        @endphp

                                        <figure class="flex flex-row mb-4">
                                            <div>
                                                <a href="#"
                                                   class="block w-20 h-20 rounded border border-gray-200 overflow-hidden">
                                                    <img class="h-20"
                                                         src="{{asset('images/product/'.$productDetails->photo)}}"
                                                         alt="Title">
                                                </a>
                                            </div>
                                            <figcaption class="ml-3">
                                                <p><a href="#"
                                                      class="text-gray-600 hover:text-blue-600">{{$productDetails->name}}</a>
                                                </p>
                                                <p class="mt-1 font-semibold">Rs. {{$productDetails->price}}</p>
                                            </figcaption>
                                        </figure>

                                    </div> <!-- grid.// -->
                                </article>
                            @endforeach
                            <!-- item-order//-->
                        </article> <!-- card.// -->
                    </div>
                </div>
            </div>
        @else
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <div class="grid grid-cols-3 gap-4">
                        <div
                            class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                            <div class="flex-auto p-4">
                                <div class="flex flex-row -mx-3">
                                    <div class="flex-none w-2/3 max-w-full px-3">
                                        <div>
                                            <p class="mb-0 font-sans font-semibold leading-normal uppercase text-size-sm">
                                                Total Orders</p>
                                            <h5 class="mb-2 font-bold">{{$dashDetails['orders']}}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="relative flex flex-col min-w-0 break-words bg-white shadow-xl rounded-2xl bg-clip-border">
                            <div class="flex-auto p-4">
                                <div class="flex flex-row -mx-3">
                                    <div class="flex-none w-2/3 max-w-full px-3">
                                        <div>
                                            <p class="mb-0 font-sans font-semibold leading-normal uppercase text-size-sm">
                                                Total Products</p>
                                            <h5 class="mb-2 font-bold">{{$dashDetails['products']}}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="relative flex flex-col min-w-0 break-words bg-white shadow-xl rounded-2xl bg-clip-border">
                            <div class="flex-auto p-4">
                                <div class="flex flex-row -mx-3">
                                    <div class="flex-none w-2/3 max-w-full px-3">
                                        <div>
                                            <p class="mb-0 font-sans font-semibold leading-normal uppercase text-size-sm">
                                                Total Sales</p>
                                            <h5 class="mb-2 font-bold">Rs.{{$dashDetails['total']}}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="relative flex flex-col min-w-0 break-words bg-white shadow-xl rounded-2xl bg-clip-border">
                            <div class="flex-auto p-4">
                                <div class="flex flex-row -mx-3">
                                    <div class="flex-none w-2/3 max-w-full px-3">
                                        <div>
                                            <p class="mb-0 font-sans font-semibold leading-normal uppercase text-size-sm">
                                                Total Buyers</p>
                                            <h5 class="mb-2 font-bold">{{$dashDetails['buyers']}}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="relative flex flex-col min-w-0 break-words bg-white shadow-xl rounded-2xl bg-clip-border">
                            <div class="flex-auto p-4">
                                <div class="flex flex-row -mx-3">
                                    <div class="flex-none w-2/3 max-w-full px-3">
                                        <div>
                                            <p class="mb-0 font-sans font-semibold leading-normal uppercase text-size-sm">
                                                Total Sellers</p>
                                            <h5 class="mb-2 font-bold">{{$dashDetails['sellers']}}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @endif
    </div>
</x-app-layout>

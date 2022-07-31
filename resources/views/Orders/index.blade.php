<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Order of your Products') }}
        </h2>
    </x-slot>

    <section class="py-12">
        <div class="container max-w-screen-xl mx-auto px-4">
            <div class="flex flex-col md:flex-row">
                <main class="px-3 grid grid-cols-2 gap-x-1 gap-y-4">
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
                                            > • {{$ord->status}} </span>
                                </p>
                                <p class="text-gray-500"> {{$ord->created_at}} </p>
                            </div>
                            @if($ord->status != 'completed')
                                <div>
                                    <a href="/order/complete/{{$ord->id}}"
                                       class="px-3 py-1 inline-block text-sm text-green-500 border border-gray-300 rounded-md hover:text-green-600 hover:border-green-600">
                                        Complete Order
                                    </a>
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
                                        <img class="h-20" src="{{asset('images/product/'.$productDetails->photo)}}"
                                             alt="Title">
                                    </a>
                                </div>
                                <figcaption class="ml-3">
                                    <p><a href="#"
                                          class="text-gray-600 hover:text-blue-600">{{$productDetails->name}}</a></p>
                                    <p class="mt-1 font-semibold">Rs. {{$productDetails->price}}</p>
                                </figcaption>
                            </figure>

                        </div> <!-- grid.// -->
                    </article>
                @endforeach
                </main>
            </div>
        </div>
    </section>
</x-app-layout>

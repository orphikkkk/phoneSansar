<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Your Order') }}
        </h2>
    </x-slot>
    <section class="py-10 bg-gray-50">
        <div class="container max-w-screen-xl mx-auto px-4">
            <div class="flex flex-col md:flex-row gap-4 lg:gap-8">
                <main class="md:w-2/3">
                    <article class="border border-gray-200 bg-white shadow-sm rounded p-4 lg:p-6 mb-5">
                        <form action="{{ route('orders.store') }}" method="post">
                            @csrf
                            <h2 class="text-xl font-semibold mb-5">Billing Information</h2>

                            <div class="grid grid-cols-2 gap-x-3">
                                <div class="mb-4">
                                    <label class="block mb-1"> First Name </label>
                                    <input
                                        class="appearance-none border border-gray-200 bg-gray-100 rounded-md py-2 px-3 hover:border-gray-400 focus:outline-none focus:border-gray-400 w-full"
                                        type="text" placeholder="Type here"
                                        name="fname">
                                </div>

                                <div class="mb-4">
                                    <label class="block mb-1"> Last name </label>
                                    <input
                                        class="appearance-none border border-gray-200 bg-gray-100 rounded-md py-2 px-3 hover:border-gray-400 focus:outline-none focus:border-gray-400 w-full"
                                        type="text" placeholder="Type here"
                                        name="lname">
                                </div>
                            </div>

                            <div class="grid grid-cols-2 gap-x-3">
                                <div class="mb-4">
                                    <label class="block mb-1"> Phone </label>
                                    <div class="flex  w-full">
                                        <input
                                            class="appearance-none w-24 border border-gray-200 bg-gray-100 rounded-tl-md rounded-bl-md py-2 px-3 hover:border-gray-400 focus:outline-none focus:border-gray-400"
                                            type="text" placeholder="Code" value="+977" disabled>
                                        <input
                                            class="appearance-none flex-1 border border-gray-200 bg-gray-100 rounded-tr-md rounded-br-md py-2 px-3 hover:border-gray-400 focus:outline-none focus:border-gray-400"
                                            type="text" placeholder="Type phone"
                                            name="phone">
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="block mb-1"> Email </label>
                                    <input
                                        class="appearance-none border border-gray-200 bg-gray-100 rounded-md py-2 px-3 hover:border-gray-400 focus:outline-none focus:border-gray-400 w-full"
                                        type="email" placeholder="Type here"
                                        name="email">
                                </div>
                            </div>
                            <hr class="my-4">

                            <h2 class="text-xl font-semibold mb-5">Shipping information</h2>

                            <div class="grid md:grid-cols-3 gap-x-3">
                                <div class="mb-4 md:col-span-2">
                                    <label class="block mb-1"> Address* </label>
                                    <input
                                        class="appearance-none border border-gray-200 bg-gray-100 rounded-md py-2 px-3 hover:border-gray-400 focus:outline-none focus:border-gray-400 w-full"
                                        type="text" placeholder="Type here"
                                        name="address">
                                </div>

                                <div class="mb-4 md:col-span-1">
                                    <label class="block mb-1"> District* </label>
                                    <input
                                        class="appearance-none border border-gray-200 bg-gray-100 rounded-md py-2 px-3 hover:border-gray-400 focus:outline-none focus:border-gray-400 w-full"
                                        type="text" placeholder="Type here"
                                        name="district">
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="block mb-1"> Other info </label>
                                <textarea placeholder="Type your wishes"
                                          class="appearance-none border border-gray-200 bg-gray-100 rounded-md py-2 px-3 hover:border-gray-400 focus:outline-none focus:border-gray-400 w-full"></textarea>
                            </div>

                            <div class="flex justify-end space-x-2">
                                <a class="px-5 py-2 inline-block text-gray-700 bg-white shadow-sm border border-gray-200 rounded-md hover:bg-gray-100 hover:text-blue-600"
                                   href="{{ route('home') }}"> Back </a>
                                <button type="submit" class="px-5 py-2 inline-block text-white bg-green-600 border border-transparent rounded-md hover:bg-green-700"> Continue </button>
                            </div>
                        </form>
                    </article> <!-- card.// -->

                </main>
                <aside class="md:w-1/3">

                    <article class="text-gray-600" style="max-width: 350px">

                        <h2 class="text-lg font-semibold mb-3">Summary</h2>
                        <ul>
                            <li class="border-t flex justify-between mt-3 pt-3">
                                <span>Total price:</span>
                                <span class="text-gray-900 font-bold">Rs. {{$productDetails->price}}</span>
                            </li>
                        </ul>
                        <hr class="my-4">

                        <h2 class="text-lg font-semibold mb-3">Items in cart</h2>

                        <figure class="flex items-center mb-4 leading-5">
                            <div>
                                <div class="block relative w-20 h-20 rounded p-1 border border-gray-200">
                                    <img class="h-18" width="70" src="{{asset('images/product/'.$productDetails->photo)}}" alt="Title">
                                    <span
                                        class="absolute -top-2 -right-2 w-6 h-6 text-sm text-center flex items-center justify-center text-white bg-gray-400 rounded-full"> 1 </span>
                                </div>
                            </div>
                            <figcaption class="ml-3">
                                <p> {{$productDetails->name}} </p>
                                <p class="mt-1 text-gray-400"> Total: Rs.{{$productDetails->price}} </p>
                            </figcaption>
                        </figure>

                    </article>

                </aside> <!-- col.// -->
            </div> <!-- grid.// -->


        </div> <!-- container.// -->
    </section>
</x-app-layout>

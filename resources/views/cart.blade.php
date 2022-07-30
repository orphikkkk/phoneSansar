<x-shop-layout>
    <!--  PAGE HEADER -->
    <section class="py-5 sm:py-7 bg-blue-100">
        <div class="container max-w-screen-xl mx-auto px-4">
            <!-- breadcrumbs start -->
            <h2 class="text-3xl font-semibold mb-2">Shopping cart</h2>

        </div><!-- /.container -->
    </section>
    <!--  PAGE HEADER .//END  -->

    <section class="py-10">
        <div class="container max-w-screen-xl mx-auto px-4">

            <div class="flex flex-col md:flex-row gap-4">
                <main  class="md:w-3/4">
                    <article class="border border-gray-200 bg-white shadow-sm rounded mb-5 p-3 lg:p-5">
                        <!-- item-cart -->
                        <div class="flex justify-between mb-4">
                            <div class="w-full lg:w-3/4 xl:w-2/4">
                                <figure class="flex">
                                    <div>
                                        <div class="block w-16 h-16 rounded border border-gray-200 overflow-hidden">
                                            <img src="{{asset('images/product/'.$product->photo)}}" alt="Title">
                                        </div>
                                    </div>
                                    <figcaption  class="ml-3">
                                        <p><a href="#" class="hover:text-blue-600">{{$product->name}} </a></p>
                                    </figcaption>
                                </figure>
                            </div>
                            <div>
                                <div class="leading-5">
                                    <p class="font-semibold not-italic">Rs.{{$product->price}}</p>
                                </div>
                            </div>
                            <div>
                                <div class="float-right">
                                    <a class="px-4 py-2 inline-block text-red-600 bg-white shadow-sm border border-gray-200 rounded-md hover:bg-gray-100" href="/cart/delete"> Remove </a>
                                </div>
                            </div>
                        </div> <!-- item-cart end// -->

                        <hr class="my-4">

                        <h6 class="font-bold">Free Delivery within 1-2 weeks</h6>
                        <p class="text-gray-400">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip</p>

                    </article> <!-- card end.// -->

                </main>
                <aside class="md:w-1/4">

                    <article class="border border-gray-200 bg-white shadow-sm rounded mb-5 p-3 lg:p-5">

                        <ul class="mb-5">
                            <li class="flex justify-between text-gray-600  mb-1">
                                <span>Total price:</span>
                                <span>Rs.{{$product->price}}</span>
                            </li>
                        </ul>

                        <a class="px-4 py-3 mb-2 inline-block text-lg w-full text-center font-medium text-white bg-green-600 border border-transparent rounded-md hover:bg-green-700" href="#"> Checkout </a>

                        <a class="px-4 py-3 inline-block text-lg w-full text-center font-medium text-green-600 bg-white shadow-sm border border-gray-200 rounded-md hover:bg-gray-100" href="#"> Back to shop </a>

                    </article> <!-- card end.// -->

                </aside> <!-- col.// -->
            </div> <!-- grid.// -->

        </div>
    </section>
</x-shop-layout>

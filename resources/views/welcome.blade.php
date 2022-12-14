<x-shop-layout>
    <!--  INTRO SECTION  -->
    <section class="bg-gradient-to-r from-sky-500 to-indigo-500">
        <div class="container max-w-screen-xl mx-auto px-4">

            <div class="pl-5 py-10 sm:py-20 grid grid-cols-2" >
                <article class="my-10 inline-block">
                    <h1 class="text-3xl md:text-5xl text-white font-bold">
                        Best products &amp; <br>brands in our store
                    </h1>
                    <p class="text-lg text-white font-normal mt-4 mb-6">
                        Buying and Selling Phones has Never Been Easier.
                    </p>
                    <div>
                        <a class="px-4 py-2 inline-block font-semibold bg-yellow-500 text-white border border-transparent rounded-md hover:bg-yellow-600"
                           href="{{ route('products') }}">
                            Discover
                        </a>
                        <a class="px-4 py-2 inline-block font-semibold text-blue-600 border border-transparent rounded-md hover:bg-gray-100 bg-white"
                           href="#">
                            Learn more
                        </a>
                    </div>
                </article>
                <img src="{{asset('images/product/iphone12.png')}}" class="mx-auto w-auto h-64" height="240" alt="Product title here">
            </div>

        </div> <!-- container //end -->
    </section>
    <!--  INTRO SECTION //END -->

    <!-- SECTION-CONTENT -->
    <section class="bg-gray-100 py-12">
        <div class="container max-w-screen-xl mx-auto px-4">
            <h2 class="text-3xl font-bold mb-8">Featured <pr></pr>Products</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    @foreach($products as $pro)
                <div>
                        <article class="shadow-sm rounded bg-white border border-gray-200">
                            <a href="#" class="block relative p-1">
                                <img src="{{asset('images/product/'.$pro->photo)}}" class="mx-auto w-auto h-60" height="240" alt="Product title here">
                            </a>
                            <div class="p-4 border-t border-t-gray-200">
                                <p class="font-semibold">Rs.{{$pro->price}}</p>
                                <a href="#" class="block text-gray-600 mb-3 hover:text-blue-500">
                                    {{$pro->name}}
                                </a>
                                <div>
                                    <a class="px-8 py-2 inline-block text-white text-center bg-blue-600 border border-transparent rounded-md hover:bg-blue-700"
                                       href="/cart/add/{{$pro->id}}">
                                        Add to cart
                                    </a>
                                </div>
                            </div>
                        </article>
                    <!-- COMPONENT: PRODUCT CARD //END -->
                </div>
                    @endforeach
            </div> <!-- grid .// -->
        </div>
    </section>
    <!--  SECTION-CONTENT  //END -->


    <!-- SECTION-FEATURES -->
    <section class="bg-white py-12">
        <div class="container max-w-screen-xl mx-auto px-4">
            <h2 class="text-3xl font-bold mb-8">Why choose us</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                <div>
                    <figure class="flex mb-4">
                        <div class="flex-shrink-0 mr-3">
							<span
                                class="block w-16 h-16 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center">
								<i class="fa fa-money-bill text-2xl"></i>
							</span>
                        </div>
                        <figcaption>
                            <h5 class="font-semibold">Reasonable prices</h5>
                            <p class="text-gray-500"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                            </p>
                        </figcaption>
                    </figure>
                </div>
                <div>
                    <figure class="flex mb-4">
                        <div class="flex-shrink-0 mr-3">
							<span
                                class="block w-16 h-16 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center">
								<i class="fa fa-star text-2xl"></i>
							</span>
                        </div>
                        <figcaption>
                            <h5 class="font-semibold">Trusted Sellers</h5>
                            <p class="text-gray-500"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                            </p>
                        </figcaption>
                    </figure>
                </div>
                <div>
                    <figure class="flex mb-4">
                        <div class="flex-shrink-0 mr-3">
							<span
                                class="block w-16 h-16 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center">
								<i class="fa fa-users text-2xl"></i>
							</span>
                        </div>
                        <figcaption>
                            <h5 class="font-semibold">Customer satisfaction</h5>
                            <p class="text-gray-500"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                            </p>
                        </figcaption>
                    </figure>
                </div>
            </div> <!-- grid .// -->
        </div> <!-- container .// -->
    </section>
    <!-- SECTION-FEATURES //END -->
</x-shop-layout>

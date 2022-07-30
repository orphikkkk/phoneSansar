<x-shop-layout>

    <!--  PAGE HEADER -->
    <section class="py-5 sm:py-7 bg-blue-100">
        <div class="container max-w-screen-xl mx-auto px-4">
            <h2 class="text-3xl font-semibold mb-2">{{$brand->name}}</h2>
        </div><!-- /.container -->
    </section>
    <!--  PAGE HEADER .//END  -->

    <!-- SECTION-CONTENT -->
    <section class="py-12">
        <div class="container max-w-screen-xl mx-auto px-4">

            <div class="flex flex-col md:flex-row -mx-4">
                <aside class="md:w-1/3 lg:w-1/4 px-4">
                    <a href="#" class="block relative p-1">
                        <img src="{{asset('images/brands/'.$brand->icon)}}" class="mx-auto w-auto object-scale-down h-28" alt="Product title here">
                    </a>
                    <div class="p-4 border-t border-t-gray-200">
                        <a href="#" class="block text-gray-600 mb-3 hover:text-blue-500">
                            {{$brand->name}}
                        </a>
                    </div>
                </aside> <!-- col.// -->
                <main  class="md:w-2/3 lg:w-3/4 px-4">

                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach($products as $pro)
                        <div>
                            <!-- COMPONENT: PRODUCT CARD -->
                            <article class="shadow-sm rounded bg-white border border-gray-200">
                                <a href="#" class="block relative p-1">
                                    <img src="{{asset('images/product/'.$pro->photo)}}" class="mx-auto w-auto h-48" height="240" alt="Product title here">
                                </a>
                                <div class="p-4 border-t border-t-gray-200">
                                    <p class="font-semibold">Rs.{{$pro->price}}</p>
                                    <a href="#" class="block text-gray-600 mb-3 hover:text-blue-500">
                                        {{$pro->name}}
                                    </a>
                                    <div>
                                        <a class="px-4 py-2 inline-block text-white text-center bg-blue-600 border border-transparent rounded-md hover:bg-blue-700" href="/cart/add/{{$pro->id}}">
                                            Add to cart
                                        </a>
                                    </div>
                                </div>
                            </article>
                            <!-- COMPONENT: PRODUCT CARD //END -->
                        </div>
                        @endforeach
                    </div> <!-- grid .// -->

                </main>  <!-- col.// -->
            </div> <!-- grid.// -->

        </div> <!-- container .// -->
    </section>
    <!--  SECTION-CONTENT  //END -->
</x-shop-layout>

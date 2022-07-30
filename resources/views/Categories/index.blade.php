<x-shop-layout>
    <!--  PAGE HEADER -->
    <section class="py-5 sm:py-7 bg-blue-100">
        <div class="container max-w-screen-xl mx-auto px-4">
            <!-- breadcrumbs start -->
            <h2 class="text-3xl font-semibold mb-2">All Categories</h2>
        </div><!-- /.container -->
    </section>
    <!--  PAGE HEADER .//END  -->

    <!-- SECTION-CONTENT -->
    <section class="py-12">
        <div class="container max-w-screen-xl mx-auto px-4">

            <div class="flex flex-col md:flex-row">
                <main>

                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-4">
                        @foreach($categories as $cat)
                            <div>
                                <!-- COMPONENT: PRODUCT CARD -->
                                <article class="shadow-sm rounded bg-white border border-gray-200 h-44">
                                    <a href="#" class="block relative p-1">
                                        <img src="{{asset('images/brands/'.$cat->icon)}}" class="mx-auto w-auto object-scale-down h-28" alt="Product title here">
                                    </a>
                                    <div class="p-4 border-t border-t-gray-200">
                                        <a href="#" class="block text-gray-600 mb-3 hover:text-blue-500">
                                            {{$cat->name}}
                                        </a>
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

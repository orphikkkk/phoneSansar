<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
        <div class="inline-flex">
        <a class="px-4 py-2 inline-block text-white bg-blue-600 border border-transparent  rounded hover:bg-blue-700"
           href="/products/create">
            Create
        </a>
{{--        <a class="px-4 py-2 inline-block text-white bg-blue-600 border border-transparent hover:bg-blue-700"--}}
{{--           href="#">--}}
{{--            Button--}}
{{--        </a>--}}
{{--        <a class="px-4 py-2 inline-block text-white bg-blue-600 border border-transparent  rounded-r hover:bg-blue-700"--}}
{{--           href="#">--}}
{{--            Button--}}
{{--        </a>--}}
        </div>
    </x-slot>
    <section class="py-12">
        <div class="container max-w-screen-xl mx-auto px-4">

            <div class="flex flex-col md:flex-row">
                <main  class="px-3">
                    @foreach($products as $pro)
                        <!-- COMPONENT: PRODUCT ITEM -->
                        <article class="border border-gray-200 overflow-hidden bg-white shadow-sm rounded mb-5">
                            <div class="flex flex-col md:flex-row">
                                <div class="md:w-1/4">
                                    <img class="mx-auto h-40 object-scale-down" src="{{asset('images/product/'.$pro->photo)}}" alt="Product name text">
                                </div> <!-- col.// -->
                                <div class="md:w-2/4">
                                    <div class="p-4">
                                        <a href="#" class="hover:text-blue-600">
                                            {{$pro->name}}
                                        </a>
                                        <div class="flex flex-wrap items-center space-x-2 mb-2">
                                            <img src="{{asset('images/misc/starts-disable.svg')}}" alt="">
                                            <b class="text-gray-300">•</b>
                                            <span class="ml-1 text-yellow-500">{{$pro->average_rating}}</span>
                                        </div>
                                        <p class="text-gray-500 mb-2">
                                            {{$pro->description}}
                                        </p>
                                        <p class="space-y-2">
                                            <span class="inline-block px-3 text-sm py-1 border border-gray-300 text-gray-400 rounded-full"> Leather  </span>
                                            <span class="inline-block px-3 text-sm py-1 border border-gray-300 text-gray-400 rounded-full"> Pink Color </span>
                                            <span class="inline-block px-3 text-sm py-1 border border-gray-300 text-gray-400 rounded-full"> Retina Screen </span>
                                            <span class="inline-block px-3 text-sm py-1 border border-gray-300 text-gray-400 rounded-full"> Original </span>
                                        </p>
                                    </div>
                                </div> <!-- col.// -->
                                <div class="md:w-1/4 border-t lg:border-t-0 lg:border-l border-gray-200">
                                    <div class="p-5">
                                        <p>
                                            <span class="text-xl font-semibold text-black">Rs. {{$pro->price}}</span>
                                        </p>
                                        <div class="my-3">
                                            <a class="px-4 py-2 inline-block text-white bg-blue-500 border border-transparent rounded-md hover:bg-blue-700" href="/products/edit/{{$pro->id}}"> Edit </a>
                                            <a class="px-4 py-2 inline-block text-white bg-red-600 border border-transparent rounded-md hover:bg-red-700" href="/products/destroy/{{$pro->id}}"> Delete </a>
                                        </div>
                                    </div>
                                </div> <!-- col.// -->
                            </div> <!-- flex.// -->
                        </article>
                        <!-- COMPONENT: PRODUCT ITEM //END -->
                    @endforeach
                </main>  <!-- col.// -->
            </div> <!-- grid.// -->

        </div> <!-- container .// -->
    </section>
</x-app-layout>

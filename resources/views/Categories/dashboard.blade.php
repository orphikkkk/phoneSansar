<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categories') }}
        </h2>
        <div class="inline-flex">
        <a class="px-4 py-2 inline-block text-white bg-blue-600 border border-transparent  rounded hover:bg-blue-700"
           href="/categories/create">
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
                <main>

                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-4">
                            @foreach($categories as $cat)
                        <div>
                            <!-- COMPONENT: PRODUCT CARD -->
                            <article class="shadow-sm rounded bg-white border border-gray-200 h-96">
                                <a href="#" class="block relative p-1">
                                    <img src="{{asset('images/brands/'.$cat->icon)}}" class="mx-auto w-auto object-scale-down h-48" alt="Product title here">
                                </a>
                                <div class="p-4 border-t border-t-gray-200">
                                    <a href="#" class="block text-gray-600 mb-3 hover:text-blue-500">
                                        {{$cat->name}}
                                    </a>
                                    <p class="text-gray-500 mb-2">{{$cat->description}}</p>
                                    <div class="my-3">
                                        <a class="px-4 py-2 inline-block text-white bg-blue-500 border border-transparent rounded-md hover:bg-blue-700" href="/categories/edit/{{$cat->id}}"> Edit </a>
                                        <a class="px-4 py-2 inline-block text-white bg-red-500 border border-transparent rounded-md hover:bg-red-700" href="/categories/destroy/{{$cat->id}}"> Delete </a>
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
</x-app-layout>

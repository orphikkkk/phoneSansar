<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit product') }}
        </h2>
    </x-slot>
    <section class="container max-w-3xl p-6 mx-auto">

        <article class="bg-white rounded shadow-sm border border-gray-200 p-4 lg:p-6 my-5">
            <form action="{{route('products.update')}}" enctype="multipart/form-data" method="post">
                <input type="hidden" name="id" value="{{$pro->id}}">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block mb-1"> Name of item </label>
                    <input type="text" name="name"
                           class="appearance-none border border-gray-200 bg-gray-100 rounded-md py-2 px-3 hover:border-gray-400 focus:outline-none focus:border-gray-400 w-full"
                           placeholder="Name of the Product"
                            value="{{$pro->name}}"/>
                </div>

                <div class="mb-4">
                    <label for="description" class="block mb-1"> Description </label>
                    <textarea rows="4" name="description"
                              class="appearance-none border border-gray-200 bg-gray-100 rounded-md py-2 px-3 hover:border-gray-400 focus:outline-none focus:border-gray-400 w-full"
                              placeholder="Type here">{{$pro->description}}</textarea>
                </div>

                <div class="mb-4">
                    <label for="sku" class="block mb-1"> Sku </label>
                    <input type="text" name="sku" id="sku"
                           class="appearance-none border border-gray-200 bg-gray-100 rounded-md py-2 px-3 hover:border-gray-400 focus:outline-none focus:border-gray-400 w-full"
                           placeholder="ip-200"
                            value="{{$pro->sku}}"/>
                </div>
                <div class="md:w-1/4">
                    <img class="mx-auto h-40 object-scale-down" src="{{asset('images/product/'.$pro->photo)}}" alt="Product name text">
                </div>
                <div class="mb-4">
                    <label class="block mb-1"> Change Image </label>
                    <input type="file" name="photo" class="w-72" placeholder="Type here"/>
                </div>

                <div class="grid md:grid-cols-2 gap-x-2">
                    <div class="mb-4">
                        <label class="block mb-1"> Brand </label>
                        <div class="relative">
                            <select name="brand"
                                    class="block appearance-none border border-gray-200 bg-gray-100 rounded-md py-2 px-3 hover:border-gray-400 focus:outline-none focus:border-gray-400 w-full">
                                @foreach($cat as $item)
                                    <option value="{{$item->id}}" {{($item->id == $pro->category_id) ? 'selected' : ''}}>{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div> <!-- grid -->

                <div class="mb-4">
                    <label class="block mb-1"> Price </label>
                    <div class="grid grid-cols-3 gap-x-2 md:w-1/2">
                        <div class="col-span-2">
                            <input type="text" name="price"
                                   class="appearance-none border border-gray-200 bg-gray-100 rounded-md py-2 px-3 hover:border-gray-400 focus:outline-none focus:border-gray-400 w-full"
                                   placeholder="0"
                            value="{{$pro->price}}"/>
                        </div>
                    </div> <!-- flex grid -->
                </div>

                <label class="flex items-center w-max my-4">
                    <input checked name="publish" type="checkbox" class="h-4 w-4" {{($pro->published) ? 'checked' : ''}}>
                    <span class="ml-2 inline-block text-gray-500"> Publish item now </span>
                </label>

                <button type="submit"
                        class="my-2 px-4 py-2 text-center inline-block text-white bg-blue-600 border border-transparent rounded-md hover:bg-blue-700">
                    Submit item
                </button>

                <a href="{{ route('dash_products') }}"
                   class="px-4 py-2 inline-block text-gray-700 bg-white shadow-sm border border-gray-200 rounded-md hover:bg-gray-100 hover:text-blue-600">
                    Cancel </a>

            </form>

        </article>


    </section> <!-- container -->
</x-app-layout>

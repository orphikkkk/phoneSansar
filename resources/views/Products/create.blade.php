<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create a new product') }}
        </h2>
    </x-slot>
    <section class="container max-w-3xl p-6 mx-auto">

        <article class="bg-white rounded shadow-sm border border-gray-200 p-4 lg:p-6 my-5">
            <form action="{{route('products.store')}}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block mb-1"> Name of item </label>
                    <input type="text" name="name" class="appearance-none border border-gray-200 bg-gray-100 rounded-md py-2 px-3 hover:border-gray-400 focus:outline-none focus:border-gray-400 w-full" placeholder="Name of the Product" />
                </div>

                <hr class="my-4">
                <h4 class="mb-4">Product Details</h4>

                <div class="grid grid-cols-2 gap-x-3">
                    <div class="mb-4">
                        <label class="block mb-1"> Condition </label>
                        <select
                            class="appearance-none border border-gray-200 bg-gray-100 rounded-md py-2 px-3 hover:border-gray-400 focus:outline-none focus:border-gray-400 w-full"
                            name="condition">
                            <option value="likeNew">Like New</option>
                            <option value="brandNew">Brand New</option>
                            <option value="used">Used</option>
                            <option value="nw">Not Working</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1"> Used For <small>(years)</small> </label>
                        <input
                            class="appearance-none border border-gray-200 bg-gray-100 rounded-md py-2 px-3 hover:border-gray-400 focus:outline-none focus:border-gray-400 w-full"
                            type="text" placeholder="Leave empty if not used"
                            name="usedFor">
                    </div>
                        <div class="mb-4">
                            <label class="block mb-1"> Brand </label>
                            <div class="relative">
                                <select name="brand" class="block appearance-none border border-gray-200 bg-gray-100 rounded-md py-2 px-3 hover:border-gray-400 focus:outline-none focus:border-gray-400 w-full">
                                    @foreach($categories as $cat)
                                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="block mb-1"> Price  </label>
                            <div class="grid grid-cols-3 gap-x-2 md:w-1/2">
                                <div class="col-span-2">
                                    <input type="text" name="price" class="appearance-none border border-gray-200 bg-gray-100 rounded-md py-2 px-3 hover:border-gray-400 focus:outline-none focus:border-gray-400 w-full" placeholder="0" />
                                </div>
                            </div> <!-- flex grid -->
                        </div>
                </div>

                <div class="mb-4">
                    <label for="description" class="block mb-1"> Description </label>
                    <textarea rows="4" name="description" class="appearance-none border border-gray-200 bg-gray-100 rounded-md py-2 px-3 hover:border-gray-400 focus:outline-none focus:border-gray-400 w-full" placeholder="Type here" ></textarea>
                </div>

                <div class="mb-4">
                    <label for="sku" class="block mb-1"> Location </label>
                    <input type="text" name="location" id="location" class="appearance-none border border-gray-200 bg-gray-100 rounded-md py-2 px-3 hover:border-gray-400 focus:outline-none focus:border-gray-400 w-full" placeholder="Location to pickup" />
                </div>

                <div class="mb-4">
                    <label class="block mb-1"> Image upload </label>
                    <input type="file" name="photo" class="w-72" placeholder="Type here" />
                </div>

                <label class="flex items-center w-max my-4">
                    <input checked name="publish" type="checkbox" class="h-4 w-4">
                    <span class="ml-2 inline-block text-gray-500"> Publish item now </span>
                </label>

                <button type="submit" class="my-2 px-4 py-2 text-center inline-block text-white bg-blue-600 border border-transparent rounded-md hover:bg-blue-700"> Submit item </button>

                <a href="{{ route('dash_products') }}" class="px-4 py-2 inline-block text-gray-700 bg-white shadow-sm border border-gray-200 rounded-md hover:bg-gray-100 hover:text-blue-600"> Cancel </a>

            </form>

        </article>


    </section> <!-- container -->
</x-app-layout>

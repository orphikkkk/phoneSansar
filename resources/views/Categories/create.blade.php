<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create a new Brand') }}
        </h2>
    </x-slot>
    <section class="container max-w-3xl p-6 mx-auto">

        <article class="bg-white rounded shadow-sm border border-gray-200 p-4 lg:p-6 my-5">
            <form action="{{route('categories.store')}}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block mb-1">Brand Name</label>
                    <input type="text" name="name" class="appearance-none border border-gray-200 bg-gray-100 rounded-md py-2 px-3 hover:border-gray-400 focus:outline-none focus:border-gray-400 w-full" placeholder="Name of the Brand" />
                </div>

                <div class="mb-4">
                    <label for="description" class="block mb-1"> Description </label>
                    <textarea rows="4" name="description" class="appearance-none border border-gray-200 bg-gray-100 rounded-md py-2 px-3 hover:border-gray-400 focus:outline-none focus:border-gray-400 w-full" placeholder="Type here" ></textarea>
                </div>

                <div class="mb-4">
                    <label class="block mb-1"> Icon </label>
                    <input type="file" name="icon" class="w-72" placeholder="Type here" />
                </div>

                <button type="submit" class="my-2 px-4 py-2 text-center inline-block text-white bg-blue-600 border border-transparent rounded-md hover:bg-blue-700"> Submit item </button>

                <a href="{{ route('dash_categories') }}" class="px-4 py-2 inline-block text-gray-700 bg-white shadow-sm border border-gray-200 rounded-md hover:bg-gray-100 hover:text-blue-600"> Cancel </a>

            </form>

        </article>


    </section> <!-- container -->
</x-app-layout>

@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-md mx-auto">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h2 class="text-lg font-medium text-gray-800 mb-6">{{ __('Update Product') }}</h2>

            <form action="{{ route('update_product', $product) }}" method="post" enctype="multipart/form-data">
                @method('patch')
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2" for="name">
                        Name
                    </label>
                    <input type="text" name="name" placeholder="Name" class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $product->name }}">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2" for="description">
                        Description
                    </label>
                    <input type="text" name="description" placeholder="Description" class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $product->description }}">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2" for="price">
                        Price
                    </label>
                    <input type="number" name="price" placeholder="Price" class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $product->price }}">
                </div>

               

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2" for="image">
                        Image
                    </label>
                    <input type="file" name="image" class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>

                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-3">
                    Submit data
                </button>
            </form>
        </div>
    </div>
</div>
@endsection

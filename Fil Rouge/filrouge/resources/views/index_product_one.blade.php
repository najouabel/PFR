@extends('layouts.app')

@section('content')
<style>
    body {
        background-image: url('images/image.jpg');
        background-repeat: no-repeat;
        background-size: 100%;
}
</style>
    <div class=" container">
        <div class="flex justify-center">
            <div class="w-9/12">
                    {{-- <div class="text-lg font-medium mb-4">{{ __('SERVICE ') }}</div> --}}
                    <div class="flex flex-lg-row flex-wrap ">
                        @foreach ($products as $product)
                            <div class="bg-white  flex flex-lg-colum justify-between w-full gap-20 space-x-4 shadow-md rounded-lg p-4 m-2">
                                {{-- <div><img class="w-full object-cover object-center w-20 mb-4 "  src="{{ url('images/'.$product->image) }}" alt="Card image cap"></div> --}}
                                <div class="font-medium mb-2 flex content-center">{{ $product->name }}</div>
                                <div><form action="{{ route('show_product', $product) }}" method="get">
                                    <button type="submit" class="bg-[#C7AD8D] text-white py-2 px-4 rounded-lg">{{ __('Show detail') }}</button>
                                </form></div>
                            </div>
                        @endforeach
                    </div>
                </div>
        </div>
        
    </div>
@endsection
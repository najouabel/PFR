@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="flex justify-center">
            <div class="w-full md:w-8/12">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="text-4xl font-extrabold  px-4 py-2">{{ __('Reservation') }}</div>

                    <div class="p-6">
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <p class="text-red-500">{{ $error }}</p>
                            @endforeach
                        @endif

                        @php
                            $total_price = 0;
                        @endphp

                        <div class="grid shadow-sm gap-4">
                            @foreach ($carts as $cart)
                                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                                    
                                    <div class="px-4 py-2 flex flex-lg-row justify-between">
                                        <h5 class="text-gray-900 font-bold text-xl">{{ $cart->product->name }}</h5>
                                        
                                        <form action="{{ route('delete_cart', $cart) }}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button type="submit"
                                                class="mt-2 bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">{{ __('Delete') }}</button>
                                        </form>
                                    </div>
                                </div>

                                @php
                                    $total_price += $cart->product->price;
                                @endphp
                            @endforeach
                        </div>

                        <div class="flex flex-col justify-end items-end mt-6">
                            <p class="text-gray-900 font-bold">{{ __('Total') }}: Rp. {{ number_format($total_price) }}</p>
                            <form action="{{ route('checkout') }}" method="post">
                                @csrf
                                <button type="submit" class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                                    @if ($carts->isEmpty()) disabled @endif>{{ __('Checkout') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

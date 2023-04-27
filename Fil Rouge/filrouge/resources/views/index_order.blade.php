@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="flex justify-center">
            <div class="w-full md:w-8/12">
                <div class="bg-white shadow-md rounded-lg p-6">
                    <h2 class="text-2xl font-bold mb-4">{{ __('Orders') }}</h2>

                    <div class="m-auto">
                        @foreach ($orders as $order)
                            <div class="bg-white shadow-md rounded-lg mb-4">
                                <div class="p-4">
                                    <a href="{{ route('show_order', $order) }}">
                                        <h3 class="text-lg font-bold mb-2">Order ID {{ $order->id }}</h3>
                                    </a>
                                    <h4 class="text-gray-500 mb-2">By {{ $order->user->name }}</h4>

                                    @if ($order->is_confirm == true)
                                        <p class="text-green-500">confirm</p>
                                    @else
                                        <p class="text-red-500">Unconfirm</p>
                                        @if ($order->payment_carte)
                                            <div class="flex flex-row justify-center items-center space-x-4">
                                                <a href="{{ url('images/' . $order->payment_carte) }} "
                                                    class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Show carte</a>
                                                @if (Auth::user()->is_admin)
                                                    <form action="{{ route('confirm_payment', $order) }}" method="post">
                                                        @csrf
                                                        {{ '' }}
                                                        <button class="bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600" type="submit">Confirm</button>
                                                    </form>
                                                @endif
                                            </div>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="flex justify-center">
            <div class="w-full md:w-8/12">
                <div class="bg-white shadow-md rounded-lg p-6">
                    <div class="font-bold text-lg mb-4">{{ __('Order Detail') }}</div>

                    @php
                        $total_price = 0;
                    @endphp

                    <div class="card-body">
                        <h5 class="card-title">Order ID {{ $order->id }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">By {{ $order->user->name }}</h6>

                        @if ($order->is_confirm == true)
                            <p class="card-text">confirmed</p>
                        @else
                            <p class="card-text">unconfirmed</p>
                        @endif

                        <hr>
                        <p>place :{{ $order->place }} </p>
                        <p>date :{{ $order->date }} </p>
                        <p>heure :{{ $order->time }} </p>
                        <p>service:</p>
                        @foreach ($order->transactions as $transaction)
                            <p>{{ $transaction->product->name }} </p>
                            @php
                                $total_price += $transaction->product->price;
                            @endphp
                           
                        @endforeach

                        <hr>

                        <p>Total: Rp. {{ number_format($total_price) }}</p>
                        
                        
                        <hr>

                        @if ($order->is_confirm == false && $order->payment_carte == null && !Auth::user()->is_admin)
                            <form action="{{ route('submit_carte', $order) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <h5 class="card-title"></h5></br>
                                    <select name="place" class="block w-full py-2 px-3 border rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm mb-2">
                                        <option value="domicile">domicile</option>
                                        <option value="salon">salon</option>
                                    </select>
                                    <input type="date" name="date" class="block w-full py-2 px-3 border rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm mb-2">
                                    <input type="time" name="time" class="block w-full py-2 px-3 border rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm mb-2"
                                    min="09:00" max="18:00" >
                                    </div>
                                    <hr>
                                <div class="form-group">
                                    <label class="block font-medium text-sm text-gray-700 mb-2">Upload your ID card</label>
                                    <input type="file" name="payment_carte" class="block w-full py-2 px-3 border rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm mb-2">
                                </div>
                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-3">Submit reservation</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

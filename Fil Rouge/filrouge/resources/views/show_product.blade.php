@extends('layouts.app')

@section('content')
<section class="bg-white dark:bg-gray-900">
    <div class="grid  px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-17">
        <div class=" lg:mt-0 w-80 lg:col-span-5 lg:flex">
            <pre>               </pre>
            <img class=" w-95 h-96"   src="{{ url('images/' . $product->image) }}" alt="hero image">
        </div>  
        <div class="mr-auto place-self-center lg:col-span-7">
            <h1 class="max-w-2xl mb-4 text-4xl font-extrabold leading-none tracking-tight md:text-5xl xl:text-6xl dark:text-white">{{ $product->name }}</h1>
            <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400"> {{ $product->description }}</p>
            <div class="space-y-4 sm:flex sm:space-y-0 sm:space-x-4">
                @if(!Auth::user()->is_admin)
                <form action="{{ route('add_to_cart', $product) }}" method="post">
                    @csrf
                    <button type="submit" class="inline-flex items-center justify-center w-full px-5 py-3 text-sm font-medium text-center text-gray-900 border border-gray-200 rounded-lg sm:w-auto hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                    prendre rendez vous
                   
                </button > </form>
                @endif
            </div>
        </div>
        
    </div>
</section> 
   
@endsection

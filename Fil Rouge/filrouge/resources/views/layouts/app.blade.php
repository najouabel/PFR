<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>beautyHouse</title>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
</head>
<body>
    <div id="app">
        <nav class="bg-white border-gray-100 dark:bg-gray-900">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto px-8 py-4">
              <a href="{{ url('/') }}" class="flex items-center">
                  <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">BeautyHouse</span>
              </a>
              <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
              </button>
              <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                  <li>
                    <a href="{{ route('index_product') }}" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-[#C7AD8D] md:p-0 dark:text-white md:dark:hover:text-[#C7AD8D] dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">home</a>
                </li>
                <li>
                  <a href="{{ route('service') }}" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-[#C7AD8D] md:p-0 dark:text-white md:dark:hover:text-[#C7AD8D] dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">service</a>
              </li>
                
                <li>
                  <a href="{{ route('contact') }}" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-[#C7AD8D] md:p-0 dark:text-white md:dark:hover:text-[#C7AD8D] dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">contact</a>
              </li>
                  @guest
                    @if (Route::has('login'))
                        <li>
                            <a href="{{ route('login') }}" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-[#C7AD8D] md:p-0 dark:text-white md:dark:hover:text-[#C7AD8D] dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">login</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li>
                            <a href="{{ route('register') }}" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-[#C7AD8D] md:p-0 dark:text-white md:dark:hover:text-[#C7AD8D] dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">registre</a>
                        </li>
                    @endif
                @else  
                <li class="relative inline-block">
                    <a  id="dropdownDefaultButton" data-dropdown-toggle="dropdown"  class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-[#C7AD8D] md:p-0 dark:text-white md:dark:hover:text-[#C7AD8D] dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent" href="#" role="button" aria-haspopup="true" aria-expanded="false" v-pre>
                      <div class="flex flex-row">
                        {{ Auth::user()->name }}
                        <svg class="w-4 h-4 ml-2 pt-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                      </div>
                    </a>
                    <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                      <div class="py-1" aria-labelledby="navbarDropdown">
                        @if (Auth::user()->is_admin)
                          <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" href="{{ route('dashbored') }}">
                            Dashboard
                          </a>
                        @else
                          <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" href="{{ route('show_cart') }}">
                            Cart
                          </a>
                        @endif
                        <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" href="{{ route('index_order') }}">
                          Order
                        </a>
                        <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" href="{{ route('show_profile') }}">
                          Profile
                        </a>
                        <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                          {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                          @csrf
                        </form>
                      </div>
                    </div>
                  </li>
                  
                @endguest
                </ul>
              </div>
            </div>
          </nav>
       
        <main >
            @yield('content')
        </main>
    </div>
</body>
</html>

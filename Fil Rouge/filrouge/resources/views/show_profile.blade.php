@extends('layouts.app')

@section('content')
<div class="container mx-auto">
  <div class="flex justify-center">
    <div class="w-full max-w-md">
      <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <div class="mb-4 font-bold text-lg">{{ __('Profile') }}</div>

        @if ($errors->any())
        <div class="mb-4">
          <ul class="list-disc list-inside text-red-600">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif

        <form action="{{ route('edit_profile') }}" method="post">
          @csrf
          <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="name">
              Name
            </label>
            <input type="text" name="name"  class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $user->name }}">
          </div>
          <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="email">
              Email
            </label>
            <input type="email" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $user->email }}" disabled>
          </div>
          <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="role">
              Role
            </label>
            <input type="role" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $user->is_admin ? 'Admin' : 'Member' }}" disabled>
          </div>
          <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="password">
              Password
            </label>
            <input type="password" name="password" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
          </div>
          <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="password_confirmation">
              Confirm password
            </label>
            <input type="password" name="password_confirmation" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
          </div>
          <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
              Change profile details
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

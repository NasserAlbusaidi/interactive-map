@extends('layouts.app')

@section('content')
<div class="container mx-auto h-screen flex justify-center items-center">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <h2 class="text-2xl font-semibold mb-4">{{ __('Register') }}</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-600">{{ __('Name') }}</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus class="mt-1 p-2 w-full border rounded-md @error('name') border-red-500 @enderror">
                @error('name')
                    <span class="text-red-500 text-xs italic">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-600">{{ __('Email Address') }}</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" class="mt-1 p-2 w-full border rounded-md @error('email') border-red-500 @enderror">
                @error('email')
                    <span class="text-red-500 text-xs italic">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-600">{{ __('Password') }}</label>
                <input id="password" type="password" name="password" required autocomplete="new-password" class="mt-1 p-2 w-full border rounded-md @error('password') border-red-500 @enderror">
                @error('password')
                    <span class="text-red-500 text-xs italic">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password-confirm" class="block text-sm font-medium text-gray-600">{{ __('Confirm Password') }}</label>
                <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password" class="mt-1 p-2 w-full border rounded-md">
            </div>

            <div class="ml-4">
                <a class="text-sm text-blue-500 hover:text-blue-700" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
        </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    {{ __('Register') }}
                </button>
        </form>
    </div>
</div>
@endsection

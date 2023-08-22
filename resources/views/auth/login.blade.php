@extends('layouts.app')

@section('content')
<div class="container mx-auto h-screen flex justify-center items-center">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <h2 class="text-2xl font-semibold mb-4">{{ __('Login') }}</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-600">{{ __('Email Address') }}</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus class="mt-1 p-2 w-full border rounded-md @error('email') border-red-500 @enderror">
                @error('email')
                    <span class="text-red-500 text-xs italic">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-600">{{ __('Password') }}</label>
                <input id="password" type="password" name="password" required autocomplete="current-password" class="mt-1 p-2 w-full border rounded-md @error('password') border-red-500 @enderror">
                @error('password')
                    <span class="text-red-500 text-xs italic">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex items-center mb-4">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label ml-2 text-sm text-gray-600" for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>


            <div>

                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    {{ __('Login') }}
                </button>
                <div class="">
                    <a class="text-sm text-blue-500 hover:text-blue-700" href="{{ route('register') }}">
                        {{ __('Not registered?') }}
                    </a>
            </div>
                @if (Route::has('password.request'))
                    <a class="text-sm text-blue-500 hover:text-blue-700 ml-4" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </div>
        </form>
    </div>
</div>
@endsection

@extends('layouts.app')

{{-- Page Name --}}
@section('page_name')
    Login
@endsection

{{-- remove navbar --}}
@section('navbar') @endsection

{{-- remove footer --}}
@section('footer') @endsection

{{-- Content --}}
@section("content")
<section class="login-section sign-section d-flex justify-content-center py-4">
    {{-- Login Form --}}
    <div class="login-form">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <!-- Email Address -->
            <div>
                <label class="d-block" for="email">Email</label>
                <input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" />
                <error :messages="$errors->get('email')" class="mt-2" />
            </div>
        
            <!-- Password -->
            <div class="mt-4">
                <label class="d-block" for="password">Password</label>
                <input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
        
                <error :messages="$errors->get('password')" class="mt-2" />
            </div>
        
            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>
        
            <div class="flex items-center justify-end mt-4">
                {{-- @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif --}}
        
                <button class="ms-3 btn btn-login" type="submit">
                    {{ __('Log in') }}
                </button>
            </div>
        </form>
    </div>
    {{-- End of Login Form --}}

    {{-- Login Content --}}
    <div class="login-content">
        <h1 class="font-bold">Welcome!, back to the <span>GuidanceHub</span></h1>
    </div>
    {{-- End of Login Content --}}
</section>
@endsection
{{-- End of Content --}}

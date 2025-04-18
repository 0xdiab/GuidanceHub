@extends('layouts.app')

{{-- Page Name --}}
@section('page_name')
    Login
@endsection

{{-- remove navbar --}}
@section('navbar')
@endsection

{{-- remove footer --}}
@section('footer')
@endsection

{{-- Content --}}
@section('content')
    <section class="login-section sign-section d-flex justify-content-center py-4">
        <div class="content d-flex justify-content-center align-items-center">
            {{-- Login Form --}}
            <div class="login-form">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <!-- Email Address -->
                    <div>
                        <label class="d-block" for="email">Email</label>
                        <input id="email" class="form-control" type="email" name="email"
                            value="{{ old('email') }}" required autofocus autocomplete="username" placeholder="Type your email" />
                        <error :messages="$errors - > get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <label class="d-block" for="password">Password</label>
                        <input id="password" class="form-control" type="password" name="password" required
                            autocomplete="current-password" placeholder="Type your password" />

                        <error :messages="$errors - > get('password')" class="mt-2" />
                    </div>

                    <div class="d-flex align-items-center my-4">
                        {{-- @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif --}}

                        <button class="btn btn-login" type="submit">
                            {{ __('Log in') }}
                        </button>
                    </div>
                </form>

                <p>Not a Member? <a class="" href="{{ route('register') }}">{{ __('Register Now') }}</a></p>
            </div>
            {{-- End of Login Form --}}

            {{-- Login Content --}}
            <div class="login-content text-center">
                <div class="icon">
                    <i class="fa-brands fa-connectdevelop"></i>
                </div>
                <div class="text">
                    <h1 class="m-0">Welcome!, back to the <span>GuidanceHub</span></h1>
                </div>
                
            </div>
            {{-- End of Login Content --}}
        </div>

    </section>
@endsection
{{-- End of Content --}}

@extends('layouts.app')

{{-- Page Name --}}
@section('page_name')
    Login
@endsection
@section('styles')
    <link rel="stylesheet" href="{{ asset('libs/Select2/css/select2.min.css') }}" />
@endsection
{{-- remove navbar --}}
@section('navbar')
@endsection

{{-- remove footer --}}
@section('footer')
@endsection

{{-- Content --}}
@section('content')
    <section class="login-section register-section sign-section d-flex justify-content-center py-4">
        <div class="content d-flex justify-content-center align-items-center">
            {{-- Login Form --}}
            <div class="login-form">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <!-- Name -->
                    <div class="mt-4">
                        <label for="name">Name</label>
                        <input id="name" class="form-control" type="text" name="name" value="{{ old('name') }}"
                            required autofocus autocomplete="name" placeholder="Type your name" />
                        <error :messages="$errors - > get('name')" class="mt-2" />
                    </div>

                    <!-- Email Address -->
                    <div class="mt-4">
                        <label class="d-block" for="email">Email</label>
                        <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}"
                            required autofocus autocomplete="username" placeholder="Type your email" />
                        <error :messages="$errors - > get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <label class="d-block" for="password">Password</label>
                        <input id="password" class="form-control" type="password" name="password" required
                            autocomplete="current-password" placeholder="Type your password" />

                        <error :messages="$errors - > get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <label for="password_confirmation">Confirm Password</label>

                        <input id="password_confirmation" class="form-control" type="password" name="password_confirmation"
                            required autocomplete="new-password" placeholder="Type your password agian" />
                        <error :messages="$errors - > get('password_confirmation')" class="mt-2" />
                    </div>

                    {{-- Current Position --}}
                    <div class="form-group mt-4">
                        <label for="position">Current Position</label>
                        <input id="position" class="form-control" type="text" name="position"
                            placeholder="Type your current position" />
                    </div>

                    <div class="form-group check-type mt-4">
                        <label for="accout-type">Account Type</label>
                        <select class="form-select" id="accout-type" name="account_type">
                            <option value="1">Mentor</option>
                            <option value="2" selected>Mentee (Defualt)</option>
                        </select>
                    </div>
                    {{-- Specializations --}}
                    <div class="check-type form-group mt-4">
                        <label for="specialization">Specialization</label>
                        <select class="form-select" id="mySelect" name="specializations[]" multiple required>
                            @foreach ($specializations as $specialization)
                                <option value="{{ $specialization->id }}">
                                    {{ $specialization->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="d-flex align-items-center my-4">
                        <button class="btn btn-login" type="submit">
                            {{ __('Register') }}
                        </button>
                    </div>
                </form>

                <p>Are you member? <a class="" href="{{ route('login') }}">{{ __('Login') }}</a></p>
            </div>
            {{-- End of Login Form --}}

            {{-- Login Content --}}
            <div class="login-content text-center">
                <div class="icon">
                    <i class="fa-brands fa-connectdevelop"></i>
                </div>
                <div class="text">
                    <h1 class="m-0">Welcome!, Register with us <span>GuidanceHub</span> and make your life better.</h1>
                </div>

            </div>
            {{-- End of Login Content --}}
        </div>

    </section>
@endsection
{{-- End of Content --}}



@section('scripts')
    <script src="{{ asset('libs/Select2/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('libs/Select2/js/select2.min.js') }}"></script>


    <script>
        $(document).ready(function() {
            $('#mySelect').select2();
        });
    </script>
@endsection




{{-- <x-guest-layout>
    <form method="POST" action="{{ route('') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

@extends('layouts.app')

{{-- Page Name --}}
@section('page_name')
    Profile Settings
@endsection

{{-- Content --}}
@section('content')
<section class="login-section register-section sign-section d-flex justify-content-center py-4">
        <div class="content d-flex justify-content-center align-items-center">
            {{-- Login Form --}}
            <div class="login-form">
            <h3 class="text-success text-center pb-4">Edit Profile</h3>

                <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    {{-- Avatar --}}
                    <div class="form-group">
                        <label for="imageUpload">Avatar</label>
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' id="imageUpload" name="image" accept=".png, .jpg, .jpeg" />
                            </div>
                            {{-- <div class="avatar-preview">
                                <div id="imagePreview"
                                    style="background-image: url({{ asset('uploads/users/' . Auth::user()->profile->image) }});">
                                </div>
                            </div> --}}
                        </div>
                    </div>

                    <!-- Name -->
                    <div class="mt-4">
                        <label for="name">Name</label>
                        <input id="name" class="form-control" type="text" name="name" value="{{ $user->name }}"
                            required autofocus autocomplete="name" placeholder="Type your name" />
                        <error :messages="$errors - > get('name')" class="mt-2" />
                    </div>

                    <!-- Email Address -->
                    <div class="mt-4">
                        <label class="d-block" for="email">Email</label>
                        <input id="email" class="form-control" type="email" name="email" value="{{ $user->email }}"
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
                    <div class="row mt-4">
                        <div class="col">
                            <label for="position">Current Position</label>
                            <input id="position" class="form-control" type="text" name="position" value="{{ $user->position }}"
                            placeholder="Type your current position" />
                        </div>
                        <div class="col">
                            <label for="session_price">Session Price</label>
                            <input id="session_price" class="form-control" type="text" name="session_price" value="{{ $user->session_price }}"
                            placeholder="Type your Session Price" />
                        </div>
                    </div>

                    {{-- Social Media URLs --}}
                    <div class="row mt-4">
                        <div class="col">
                            <label for="linkedin">Linkedin URL</label>
                            <input type="text" class="form-control" id="linkedin" value="{{ $user->linkedin_url }}" placeholder="linkedin.com/in/idiab1">
                        </div>
                        <div class="col">
                            <label for="twitter">Twitter URL</label>
                            <input type="text" class="form-control" id="twitter" value="{{ $user->x_url }}" placeholder="x.com/0xD1ab">
                        </div>
                    </div>

                    {{-- Social Media URLs --}}
                    <div class="row mt-4">
                        <div class="col">
                            <label for="github">Github URL</label>
                            <input type="text" class="form-control" id="github" value="{{ $user->github_url }}" placeholder="github.com/0xdiab">
                        </div>
                        <div class="col">
                            <label for="cvurl">CV URL</label>
                            <input type="text" class="form-control" id="cvurl" value="{{ $user->cv_url }}" placeholder="example.com/cv">
                        </div>
                    </div>

                    <div class="row mt-4">
                        {{-- Check on Gender --}}
                        <div class="col">
                            <div class="check-type mt-4">
                                <label for="gender">Gender</label>
                                <select class="form-select" id="gender">
                                    <option value="1" selected>Male (Defualt)</option>
                                    <option value="2">Female</option>
                                </select>
                            </div>
                        </div>

                        {{-- Check on mentors or mentee --}
                        <div class="col">
                            <div class="check-type mt-4">
                                <label for="accout-type">Account Type</label>
                                <select class="form-select" id="accout-type">
                                    <option value="1">Mentor</option>
                                    <option value="2" selected>Mentee (Defualt)</option>
                                </select>
                            </div>
                        </div>--}}

                    </div>
                    <div class="d-flex align-items-center my-4">
                        <button class="btn btn-login" type="submit">
                            {{ __('Save') }}
                        </button>
                    </div>
                </form>

            </div>
            {{-- End of Login Form --}}

            {{-- Login Content --}
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



{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}

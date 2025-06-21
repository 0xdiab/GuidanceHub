@extends('layouts.app')

{{-- Page Name --}}
@section('page_name')
    Profile Settings
@endsection
@section('styles')
    <link rel="stylesheet" href="{{ asset('libs/Select2/css/select2.min.css') }}" />
@endsection
{{-- Content --}}
@section('content')
    {{-- profile-setting --}}
    <div class="profile-section profile-setting py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-7">
                    {{-- card-form --}}
                    <div class="card card-form card-data">
                        {{-- Card-header --}}
                        <div class="card-header">
                            <div class="row justify-content-around">
                                <div class="col-6">
                                    <h4 class="heading m-0 p-2">Setting</h4>
                                </div>
                                <div class="col-6 text-end">
                                    <form action="{{ route('profile.destroy') }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">Delete Profile</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{-- card-body --}}
                        <div class="card-body">
                            <div class="form-content">
                                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    {{-- Avatar --}}
                                    <div class="form-group">
                                        <label for="imageUpload">Avatar</label>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="avatar-edit">
                                                    <input type='file' id="imageUpload" name="image"
                                                        accept=".png, .jpg, .jpeg" />
                                                </div>
                                            </div>
                                            <div class="col-6 d-flex justify-content-center">
                                                {{-- Avatar --}}
                                                @if (Auth::user()->image)
                                                    <div class="avatar-preview">
                                                        <img src="{{ asset('storage/profile_images/' . Auth::user()->image) }}"
                                                            class="img-fluid rounded-circle shadow-sm" width="200"
                                                            height="200" />
                                                    </div>
                                                @else
                                                    <div class="avatar-preview">
                                                        <img src="{{ asset('image/avatar.jpg') }}"
                                                            class="img-fluid rounded-circle shadow-sm" width="200"
                                                            height="200" />
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Name -->
                                    <div class="form-group mt-4">
                                        <label for="name">Name</label>
                                        <input id="name" class="form-control" type="text" name="name"
                                            value="{{ $user->name }}" required autofocus autocomplete="name"
                                            placeholder="Type your name" />
                                    </div>

                                    <!-- Email Address -->
                                    <div class="form-group mt-4">
                                        <label class="d-block" for="email">Email</label>
                                        <input id="email" class="form-control" type="email" name="email"
                                            value="{{ $user->email }}" required autofocus autocomplete="username"
                                            placeholder="Type your email" />
                                        <error :messages="$errors - > get('email')" class="mt-2" />
                                    </div>

                                    <!-- Password -->
                                    <div class="form-group mt-4">
                                        <label class="d-block" for="password">Password</label>
                                        <input id="password" class="form-control" type="password" name="password" required
                                            autocomplete="current-password" placeholder="Type your password" />

                                        <error :messages="$errors - > get('password')" class="mt-2" />
                                    </div>

                                    <!-- Confirm Password -->
                                    <div class="form-group mt-4">
                                        <label for="password_confirmation">Confirm Password</label>

                                        <input id="password_confirmation" class="form-control" type="password"
                                            name="password_confirmation" required autocomplete="new-password"
                                            placeholder="Type your password agian" />

                                        <error :messages="$errors - > get('password_confirmation')" class="mt-2" />
                                    </div>
                                    @if ($user->account_type == 'mentor')
                                        {{-- Current Position --}}
                                        <div class="row mt-4">
                                            <div class="col">
                                                <label for="position">Current Position</label>
                                                <input id="position" class="form-control" type="text" name="position"
                                                    value="{{ $user->name }}" placeholder="Type your current position" />
                                            </div>
                                            <div class="col">
                                                <label for="session_price">Session Price</label>
                                                <input id="session_price" class="form-control" type="number"
                                                    name="session_price" placeholder="Type your Session Price"
                                                    value="{{ $user->session_price }}" />
                                            </div>
                                        </div>
                                    @else
                                        <div class="group-form mt-4">
                                            <label for="position">Current Position</label>
                                            <input id="position" class="form-control" type="text" name="position"
                                                placeholder="Type your current position" value="{{ $user->position }}" />
                                        </div>
                                    @endif

                                    {{-- Social Media URLs --}}
                                    <div class="row mt-4">
                                        <div class="col">
                                            <label for="linkedin">Linkedin URL</label>
                                            <input type="text" class="form-control" id="linkedin"
                                                name="linkedin_url" placeholder="linkedin.com/in/idiab1"
                                                value="{{ $user->linkedin_url }}">
                                        </div>
                                        <div class="col">
                                            <label for="twitter">Twitter URL | X URL</label>
                                            <input type="text" class="form-control" id="twitter" name="twitter_url"
                                                placeholder="x.com/0xD1ab" value="{{ $user->twitter_url }}">
                                        </div>
                                    </div>

                                    {{-- Social Media URLs --}}
                                    <div class="row mt-4">
                                        <div class="col">
                                            <label for="github">Github URL</label>
                                            <input type="text" class="form-control" id="github" name="github_url"
                                                placeholder="github.com/0xdiab" value="{{ $user->github_url }}">
                                        </div>
                                        <div class="col">
                                            <label for="cvurl">CV URL</label>
                                            <input type="password" class="form-control" id="cvurl" name="cv_url"
                                                placeholder="example.com/cv" value="{{ $user->cv_url }}">
                                        </div>
                                    </div>

                                    <div class="row mt-4">
                                        {{-- Check on Gender --}}
                                        <div class="col">
                                            <div class="form-group mt-4">
                                                <label for="gender">Gender</label>
                                                <select class="form-select" id="gender" name="gender">
                                                    <option value="1"
                                                        {{ $user->gender == 'male' ? 'selected' : '' }}>Male
                                                        (Defualt)</option>
                                                    <option value="2"
                                                        {{ $user->gender == 'female' ? 'selected' : '' }}>Female
                                                    </option>
                                                </select>
                                            </div>
                                        </div>

                                        {{-- Check on mentors or mentee --}}
                                        <div class="col">
                                            <div class="form-group mt-4">
                                                <label for="accout-type">Account Type</label>
                                                <select class="form-select" id="accout-type" name="account_type">
                                                    <option value="1"
                                                        {{ $user->account_type == 'mentee' ? 'selected' : '' }}>
                                                        mentee</option>
                                                    <option value="2"
                                                        {{ $user->account_type == 'mentee' ? 'selected' : '' }}>
                                                        Mentee (Defualt)</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Specializations --}}
                                    <div class="check-type form-group mt-4">
                                        <label for="specialization">Specialization</label>
                                        <select class="form-select" id="mySelect" name="specializations[]" multiple
                                            required>
                                            @php
                                                $id = 1;
                                            @endphp
                                            @foreach ($specializations as $specialization)
                                                <option value="{{ $id++ }}"
                                                    {{ $user->specializations->contains('id', $specialization->id) == $specialization->id ? 'selected' : '' }}>
                                                    {{ $specialization->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    {{-- skills --}}
                                    <div class="check-type form-group mt-4">
                                        <label for="skill">Skills</label>
                                        <select class="form-select" id="skills" name="skills[]" multiple
                                            required>
                                            @php
                                                $id = 1;
                                            @endphp
                                            @foreach ($skills as $skill)
                                                <option value="{{ $id++ }}"
                                                    {{ $user->skills && $user->skills->contains('id', $skill->id) ? 'selected' : '' }} >
                                                    {{ $skill->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    {{-- Summary --}}
                                    <div class="form-group mt-4">
                                        <label for="summary">Summary</label>
                                        <textarea class="form-control" name="summary" id="summary" cols="30" rows="10">
                                            {{ $user->summary }}
                                        </textarea>
                                    </div>

                                    <div class="form-group mt-4">
                                        <button type="submit" class="btn btn-submit btn-login">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        {{-- ./card-body --}}
                    </div>
                    {{-- ./card-form --}}
                </div>
            </div>
        </div>
    </div>
    {{-- ./profile-setting --}}
@endsection

@section('scripts')
    <script src="{{ asset('libs/Select2/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('libs/Select2/js/select2.min.js') }}"></script>


    <script>
        $(document).ready(function() {
            $('#mySelect').select2();
        });
        $(document).ready(function() {
            $('#skills').select2();
        });
    </script>
@endsection

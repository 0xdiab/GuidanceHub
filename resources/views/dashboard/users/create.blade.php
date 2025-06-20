@extends('layouts.dashboard.app')

{{-- Page name --}}
@section('page_name')
    Add a new admins
@endsection
@section('styles')
    <link rel="stylesheet" href="{{ asset('libs/Select2/css/select2.min.css') }}" />
@endsection
{{-- breadcrumb-item --}}
@section('breadcrumb-items')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.admins.index') }}">Admins</a></li>
    <li class="breadcrumb-item active" aria-current="page">Create a new admin</li>
@endsection

{{-- Main Content --}}
@section('main-content')
    {{-- admins section --}}
    <section class="section admins-section form-page py-4">
        {{-- Container --}}
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-7">
                    {{-- card-form --}}
                    <div class="card card-form card-data">
                        {{-- Card-header --}}
                        <div class="card-header">
                            <h4 class="heading m-0 p-2">Create a new admin</h4>
                        </div>
                        {{-- card-body --}}
                        <div class="card-body">
                            <div class="form-content">
                                <form action="{{ route('dashboard.admins.store') }}" method="POST">
                                    @csrf
                                    <!-- Name -->
                                    <div class="form-group mt-4">
                                        <label for="name">Name</label>
                                        <input id="name" class="form-control" type="text" name="name"
                                            value="{{ old('name') }}" required autofocus autocomplete="name"
                                            placeholder="Type your name" />
                                    </div>

                                    <!-- Email Address -->
                                    <div class="form-group mt-4">
                                        <label class="d-block" for="email">Email</label>
                                        <input id="email" class="form-control" type="email" name="email"
                                            value="{{ old('email') }}" required autofocus autocomplete="username"
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

                                    {{-- Current Position --}}
                                    <div class="row mt-4">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="position">Current Position</label>
                                                <input id="position" class="form-control" type="text" name="position"
                                                    placeholder="Type your current position" />
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="session_price">Session Price</label>
                                                <input id="session_price" class="form-control" type="number"
                                                    name="session_price" placeholder="Type your Session Price" />
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Social Media URLs --}}
                                    <div class="row mt-4">
                                        <div class="col">
                                            <label for="linkedin">Linkedin URL</label>
                                            <input type="text" class="form-control" id="linkedin" name="linkedin_url"
                                                placeholder="linkedin.com/in/idiab1">
                                        </div>
                                        <div class="col">
                                            <label for="twitter">Twitter URL | X URL</label>
                                            <input type="text" class="form-control" id="twitter" name="twitter_url"
                                                placeholder="x.com/0xD1ab">
                                        </div>
                                    </div>

                                    {{-- Social Media URLs --}}
                                    <div class="row mt-4">
                                        <div class="col">
                                            <label for="github">Github URL</label>
                                            <input type="text" class="form-control" id="github" name="github_url"
                                                placeholder="github.com/0xdiab">
                                        </div>
                                        <div class="col">
                                            <label for="cvurl">CV URL</label>
                                            <input type="password" class="form-control" id="cvurl" name="cv_url"
                                                placeholder="example.com/cv">
                                        </div>
                                    </div>

                                    <div class="row mt-4">
                                        {{-- Check on Gender --}}
                                        <div class="col">
                                            <div class="check-type mt-4">
                                                <label for="gender">Gender</label>
                                                <select class="form-select" id="gender" name="gender">
                                                    <option value="1" selected>Male (Defualt)</option>
                                                    <option value="2">Female</option>
                                                </select>
                                            </div>
                                        </div>

                                        {{-- Check on mentors or mentee --}}
                                        <div class="col">
                                            <div class="check-type mt-4">
                                                <label for="accout-type">Account Type</label>
                                                <select class="form-select" id="accout-type" name="account_type">
                                                    <option value="1">Mentor</option>
                                                    <option value="2" selected>Mentee (Defualt)</option>
                                                </select>
                                            </div>
                                        </div>
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
                                    <div class="form-group mt-4">
                                        <button type="submit" class="btn btn-submit">Submit</button>
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
        {{-- ./Container --}}
    </section>
    {{-- end of admins section --}}
@endsection
@section('scripts')
    <script src="{{ asset('libs/Select2/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('libs/Select2/js/select2.min.js') }}"></script>


    <script>
        $(document).ready(function() {
            $('#mySelect').select2();
        });
    </script>
@endsection
@extends('layouts.dashboard.app')

{{-- Page name --}}
@section('page_name')
    Edit - {{ $user->name }}
@endsection

{{-- breadcrumb-item --}}
@section('breadcrumb-items')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.admins.index') }}">Admins</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit - {{ $user->name }}</li>
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
                            <h4 class="heading m-0 p-2">Edit - {{ $user->name }}</h4>
                        </div>
                        {{-- card-body --}}
                        <div class="card-body">
                            <div class="form-content">
                                <form action="{{ route('dashboard.admins.update', ['id' => $user->id ]) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <!-- Name -->
                                    <div class="mt-4">
                                        <label for="name">Name</label>
                                        <input id="name" class="form-control" type="text" name="name"
                                            value="{{ $user->name }}" required autofocus autocomplete="name"
                                            placeholder="Type your name" />
                                        <error :messages="$errors - > get('name')" class="mt-2" />
                                    </div>

                                    <!-- Email Address -->
                                    <div class="mt-4">
                                        <label class="d-block" for="email">Email</label>
                                        <input id="email" class="form-control" type="email" name="email"
                                            value="{{ $user->email }}" required autofocus autocomplete="username"
                                            placeholder="Type your email" />
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

                                        <input id="password_confirmation" class="form-control" type="password"
                                            name="password_confirmation" required autocomplete="new-password"
                                            placeholder="Type your password agian" />

                                        <error :messages="$errors - > get('password_confirmation')" class="mt-2" />
                                    </div>

                                    {{-- Current Position --}}
                                    <div class="row mt-4">
                                        <div class="col">
                                            <label for="position">Current Position</label>
                                            <input id="position" class="form-control" type="text" name="position"
                                                placeholder="Type your current position" value="{{ $user->position }}"/>
                                        </div>
                                        <div class="col">
                                            <label for="session_price">Session Price</label>
                                            <input id="session_price" class="form-control" type="number"
                                                name="session_price" placeholder="Type your Session Price" value="{{ $user->session_price }}" />
                                        </div>
                                    </div>

                                    {{-- Social Media URLs --}}
                                    <div class="row mt-4">
                                        <div class="col">
                                            <label for="linkedin">Linkedin URL</label>
                                            <input type="text" class="form-control" id="linkedin"  name="linkedin_url"
                                                placeholder="linkedin.com/in/idiab1" value="{{ $user->linkedin_url }}" >
                                        </div>
                                        <div class="col">
                                            <label for="twitter">Twitter URL | X URL</label>
                                            <input type="text" class="form-control" id="twitter" name="twitter_url"
                                                placeholder="x.com/0xD1ab" value="{{ $user->x_url }}" >
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
                                            <div class="check-type mt-4">
                                                <label for="gender">Gender</label>
                                                <select class="form-select" id="gender" name="gender">
                                                    <option value="1" {{($user->gender == "male") ? "selected" : "" ; }}>Male (Defualt)</option>
                                                    <option value="2" {{($user->gender == "female") ? "selected" : "" ; }}>Female</option>
                                                </select>
                                            </div>
                                        </div>

                                        {{-- Check on mentors or mentee --}}
                                        <div class="col">
                                            <div class="check-type mt-4">
                                                <label for="accout-type">Account Type</label>
                                                <select class="form-select" id="accout-type" name="account_type">
                                                    <option value="1"  {{ ($user->account_type == "mentor") ? "selected" : "" ; }}>Mentor</option>
                                                    <option value="2"  {{ ($user->account_type == "mentee") ? "selected" : "" ; }}>Mentee (Defualt)</option>
                                                </select>
                                            </div>
                                        </div>
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

@extends('layouts.app')

{{-- Page Name --}}
@section('page_name')
    Profile Settings
@endsection

{{-- Content --}}
@section('content')
    {{-- Profile --}}
    <div class="profile-section section py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    {{-- Profile header --}}
                    <div class="profile-header rounded shadow-sm p-3 mb-5">
                        <div class="row mb-4">
                            <div class="col-8">
                                <div class="profile-image-container">
                                    <img class="img-fluid rounded-circle shadow-sm"
                                        src="{{ $user->image ? asset('storage/profile_images/' . $user->image) : asset('image/avatar.jpg') }}"
                                        width="200" height="200" />
                                </div>
                                <div class="mb-2 pt-3">
                                    <h2 class="mb-0 me-2">{{ $user->name }}</h2>
                                    <p class="text-muted mb-3 fs-5">
                                        {{ $user->position }}
                                        @if ($user->session_price)
                                            <span class="fw-bold"> - ${{ $user->session_price }}</span>
                                        @endif
                                    </p>
                                </div>

                            </div>
                            <div class="col-4">
                                {{-- Contacts --}}
                                <div class="contacts rounded p-3 mb-5">
                                    <h3>Contact Details</h3>
                                    <ul class="list-unstyled">
                                        <li class="mb-3">
                                            <span>Email: </span>
                                            <a href="mailto:{{ $user->email }}">
                                                {{ $user->email }}
                                            </a>
                                        </li>
                                        {{-- Linkedin --}}
                                        <li class="mb-3">
                                            <span>Linkedin: </span>
                                            @if ($user->linkedin_url)
                                                <a href="{{ $user->linkedin_url }}" target="_blank">
                                                    {{ $user->linkedin_url }}
                                                </a>
                                            @else
                                                <a class="text-dark" href="{{ route('profile.edit') }}"><i
                                                        class="fas fa-plus-circle"></i> Add</a>
                                            @endif
                                        </li>
                                        {{-- X --}}
                                        <li class="mb-3">
                                            <span>x: </span>
                                            @if ($user->x_url)
                                                <a href="{{ $user->x_url }}" target="_blank">
                                                    {{ $user->x_url }}
                                                </a>
                                            @else
                                                <a class="text-dark" href="{{ route('profile.edit') }}"><i
                                                        class="fas fa-plus-circle"></i> Add</a>
                                            @endif
                                        </li>

                                        {{-- CV --}}
                                        <li class="mb-3">
                                            <span>CV: </span>
                                            @if ($user->cv_url)
                                                <a href="{{ $user->cv_url }}" target="_blank">
                                                    {{ $user->cv_url }}
                                                </a>
                                            @else
                                                <a class="text-dark" href="{{ route('profile.edit') }}"><i
                                                        class="fas fa-plus-circle"></i> Add</a>
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- About profile --}}
                    <div class="about-profile rounded shadow-sm p-3 mb-5">
                        <h3>Summary</h3>
                        @if ($user->summary)
                            <p>{{ $user->summary }}</p>
                        @else
                            <p>You are not submitted your summary.</p>
                            <a class="text-dark" href="{{ route('profile.edit') }}"><i class="fas fa-plus-circle"></i>
                                Add</a>
                        @endif
                    </div>

                    {{-- About profile --}}
                    <div class="skills-profile rounded shadow-sm p-3 mb-5">
                        <h3>Skills</h3>
                        @if ($user->skills->count() > 0)
                            @foreach ($user->skills as $skill)
                                <span>{{$user->skills->name}}</span>
                            @endforeach
                            <a class="text-dark" href="{{ route('profile.edit') }}"><i class="fas fa-plus-circle"></i>
                                Add</a>
                        @else
                            <p>You are not submitted your skills.</p>
                            <a class="text-dark" href="{{ route('profile.edit') }}"><i class="fas fa-plus-circle"></i>
                                Add</a>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

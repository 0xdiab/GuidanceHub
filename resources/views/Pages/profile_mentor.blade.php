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
                                        src="{{ $mentor->image ? asset('storage/profile_images/' . $mentor->image) : asset('image/avatar.jpg') }}"
                                        width="200" height="200" />
                                </div>
                                <div class="mb-2 pt-3">
                                    <h2 class="mb-0 me-2">{{ $mentor->name }}</h2>
                                    <p class="text-muted mb-3 fs-5">
                                        {{ $mentor->position }}

                                    </p>
                                </div>

                            </div>
                            <div class="col-4">
                                {{-- Contacts --}}
                                <div class="contacts rounded p-3 mb-5">
                                    <h3>Contact Details</h3>
                                    <ul class="list-unstyled">
                                        {{-- Email --}}
                                        <li class="mb-3">
                                            <span>Email: </span>
                                            <a href="mailto:{{ $mentor->email }}">
                                                {{ $mentor->email }}
                                            </a>
                                        </li>
                                        {{-- Linkedin --}}
                                        @if ($mentor->linkedin_url)
                                            <li class="mb-3">
                                                <span>Linkedin: </span>
                                                <a href="{{ $mentor->linkedin_url }}" target="_blank">
                                                    {{ $mentor->linkedin_url }}
                                                </a>
                                            </li>
                                        @endif
                                        {{-- X --}}
                                        @if ($mentor->x_url)
                                            <li class="mb-3">
                                                <span>x: </span>
                                                <a href="{{ $mentor->x_url }}" target="_blank">
                                                    {{ $mentor->x_url }}
                                                </a>
                                            </li>
                                        @endif

                                        {{-- CV --}}
                                        @if ($mentor->cv_url)
                                            <li class="mb-3">
                                                <span>CV: </span>
                                                <a href="{{ $mentor->cv_url }}" target="_blank">
                                                    {{ $mentor->cv_url }}
                                                </a>
                                            </li>
                                        @endif

                                        {{-- Price & Book Session --}}
                                        @if ($mentor->session_price)
                                            <li class="mb-3">
                                                <span>Price: </span>
                                                <span class="fw-bold"> - ${{ $mentor->session_price }}</span>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- About profile --}}
                    <div class="about-profile rounded shadow-sm p-3 mb-5">
                        <h3>Summary</h3>
                        @if ($mentor->summary)
                            <p>{{ $mentor->summary }}</p>
                        @else
                            <span>Empty.</span>
                        @endif
                    </div>

                    {{-- skills profile --}}
                    <div class="skills-profile rounded shadow-sm p-3 mb-5">
                        <h3>Skills</h3>
                        {{-- <p>{{ $mentor }}</p> --}}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

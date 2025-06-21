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

                    {{-- Skills profile --}}
                    <div class="skills-profile rounded shadow-sm p-3 mb-5">
                        <h3>Skills</h3>
                        @if ($mentor->skills->count() > 0)
                            <ul class="list-unstyled skills">
                                @foreach ($mentor->skills as $skill)
                                    <li><span>{{ $skill->name }}</span></li>
                                @endforeach
                            </ul>
                            <a class="text-dark" href="{{ route('profile.edit') }}"><i class="fas fa-plus-circle"></i>
                                Add</a>
                        @else
                            <p>You are not submitted your skills.</p>
                            <a class="text-dark" href="{{ route('profile.edit') }}"><i class="fas fa-plus-circle"></i>
                                Add</a>
                        @endif
                    </div>

                    {{-- reviews profile --}}
                    <div class="reviews-profile rounded shadow-sm p-3 mb-5">
                        <h3>Reviews</h3>
                        @if ($reviews->count() > 0)
                            <ul class="list-unstyled skills">
                                @foreach ($reviews as $review)
                                    <li class="review border rounded p-3 mb-3">
                                        <div class="row">
                                            <div class="col-8">
                                                {{ $review->reviewer->name }} - {{ $review->session->specialization->name ?? 'N/A' }} - {{ $review->created_at->format('d M Y - h:i A') }}
                                                <p> {{ $review->review ?? 'No comment' }}</p>
                                            </div>
                                            <div class="col-4 text-end">
                                                <div><strong>Rating:</strong> {{ $review->rating }} / 5</div>
                                            </div>
                                        </div>

                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p>No reviews yet.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

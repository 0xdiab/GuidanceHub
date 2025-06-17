@extends('layouts.app')

{{-- Page Name --}}
@section('page_name')
    Profile Settings
@endsection

{{-- Content --}}
@section('content')
    {{--<section class="content profile-section py-4">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    {{-- profile header --}
                    <div class="profile-header">
                        <div class="row">
                            <div class="col-md-4">
                                {{-- Profile image --}
                                <div class="profile-image">
                                    <img class="img-fluid" src="{{ asset('image/avatar.jpg') }}"
                                        alt="avatar image">
                                </div>
                                {{-- ./profile-image --}
                            </div>
                            <div class="col-md-8">
                                {{-- profile-info --}
                                <div class="profile-info">
                                    <h2>{{ $user->name }}</h2>
                                    <span>Position title</span>
                                    <div class="languages">
                                        <p>Speak: English, Arabic</p>
                                    </div>
                                    {{-- social-media --}
                                    <ul class="social-media">
                                        <li>
                                            <a class="btn btn-danger" href="" target="_blank">test</a>
                                        </li>
                                    </ul>
                                    {{-- ./social-media --}
                                </div>
                                {{-- ./profile-info --}
                            </div>
                        </div>
                    </div>
                    {{-- ./profile-header --}
                </div>
            </div>

            <div class="row">
                <div class="row py-4">
                    <div class="col-md-7 col-sm-12">
                        <nav>
                            <div class="nav profile-nav-tabs" id="nav-tab" role="tablist">
                                <button class="nav-link active" id="nav-summary-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-summary" type="button" role="tab" aria-controls="nav-summary"
                                    aria-selected="true">Summary</button>
                                <button class="nav-link" id="nav-reviews-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-reviews" type="button" role="tab" aria-controls="nav-reviews"
                                    aria-selected="false">Reviews</button>
                                <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact"
                                    aria-selected="false">Contact</button>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-summary" role="tabpanel"
                                aria-labelledby="nav-summary-tab">
                                <div class="row py-4">
                                    <div class="col-md-7 col-sm-12">
                                        {{-- summary --}
                                        <div class="summary">
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde ipsum veniam
                                                maxime
                                                quo consectetur
                                                nihil,
                                                quos qui eveniet beatae vero dicta numquam, quaerat illum perferendis
                                                tenetur
                                                quam corrupti
                                                voluptatem quae
                                                perspiciatis necessitatibus modi, officia tempora voluptatibus! Velit
                                                exercitationem, tempore
                                                beatae,
                                                eum obcaecati ex quod nulla dolor provident, ipsa voluptates sed!</p>
                                        </div>
                                        {{-- ./summary --}

                                    </div>

                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-reviews" role="tabpanel" aria-labelledby="nav-reviews-tab">

                            </div>
                            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                ...
                            </div>
                        </div>

                    </div>
                    <div class="col-md-5 col-sm-12 mx-auto">
                        {{-- skills --}
                        <ul class="skills">
                            <li>JavaScript</li>
                            <li>PHP</li>
                            <li>MySQL</li>
                            <li>HTML</li>
                            <li>Python</li>
                            <li>Laravel</li>
                        </ul>
                        {{-- ./skills --}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">


                </div>
            </div>


        </div>
    </section>--}}
    <div class="container-fluid bg-light min-vh-100 py-4">
    <div class="container">
    <div class="row">
            <div class="col-lg-8">
                <div class="bg-muted rounded shadow-sm p-4">
                    <!-- Profile Header -->
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <div class="profile-image-container">
                                <img src="{{ $user->image ?: asset('image/avatar.jpg') }}" 
                                     alt="{{ $user->name }}" 
                                     class="img-fluid rounded-3 w-100" 
                                     style="aspect-ratio: 3/4; object-fit: cover;">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="d-flex align-items-start mb-2 pt-3">
                                {{--<span class="badge bg-secondary me-2">#{{ $user->rank ?? '2' }}</span>--}}
                                <h2 class="mb-0 me-2">{{ $user->name }}</h2>
                            </div>
                            
                            <p class="text-muted mb-3 fs-5">{{ $user->position }}</p>
                            <p>
                                <a href="{{ route('profile.edit') }}" class="text-success text-decoration-none">Edit Profile</a>
                            </p>
                            <form action="{{ route('profile.destroy') }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Delete Profile</button>
                            </form>
                            
                            {{--<div class="mb-3">
                                <i class="fas fa-comment-dots text-muted me-2"></i>
                                <span class="me-1">Speaks: English</span>
                                <span class="badge bg-success text-uppercase small">NATIVE</span>
                                <span class="ms-2">Spanish, Turkish</span>
                            </div>--}}
                            
                            {{--<div class="d-flex gap-3">
                                <div class="d-flex align-items-center">
                                    <div class="bg-success rounded-circle p-2 me-2">
                                        <i class="fas fa-tutor text-white"></i>
                                    </div>
                                    <div>
                                        <div class="fw-semibold">A highly rated and experienced Mentor</div>
                                        <small class="text-muted">SUPER Mentor</small>
                                    </div>
                                </div>
                                
                                <div class="d-flex align-items-center">
                                    <div class="bg-danger rounded-circle p-2 me-2">
                                        <i class="fas fa-chart-line text-white"></i>
                                    </div>
                                    <div>
                                        <div class="fw-semibold">Top 1%</div>
                                        <small class="text-muted">ENGLISH Mentor</small>
                                    </div>
                                </div>
                            </div>--}}
                        </div>
                    </div>

                    <!-- Navigation Tabs -->
                    <ul class="nav profile-nav-tabs border-0 mt-4" id="profileTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active border-0 profile-border-bottom-3 border-success text-success fw-semibold" 
                                    id="about-tab" data-bs-toggle="tab" data-bs-target="#about" type="button" role="tab">
                                About
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link border-0 text-muted" 
                                    id="experience-tab" data-bs-toggle="tab" data-bs-target="#experience" type="button" role="tab">
                                Work experience
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link border-0 text-muted" 
                                    id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews" type="button" role="tab">
                                Reviews ({{ $user->reviews_count ?? '30' }})
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link border-0 text-muted" 
                                    id="availability-tab" data-bs-toggle="tab" data-bs-target="#availability" type="button" role="tab">
                                Availability
                            </button>
                        </li>
                    </ul>

                    <!-- Tab Content -->
                    <div class="bg-white tab-content p-4" id="profileTabsContent">
                        <div class="tab-pane fade show active" id="about" role="tabpanel">
                            <h4 class="mb-3">About Me</h4>
                            <p class="text-muted lh-lg">
                                {{ $user->summary ?? "Greetings, fellow design aficionados! I'm delighted to have caught your interest in perusing my profile. I'm Nguyen Shane, a 24-year-old UI/UX designer hailing from the United Kingdom. My educational journey culminated in the attainment of a Bachelor's Degree in Graphic Design, with a specialization in User Interface and User Experience design. This qualification empowers me to delve into the realm of user-centered design, crafting engaging and intuitive experiences for digital..." }}
                            </p>
                        </div>
                        <div class="tab-pane fade" id="experience" role="tabpanel">
                            <h4 class="mb-3">Work Experience</h4>
                            <div class="mb-3">
                                <small class="text-muted text-uppercase">SKILLS</small>
                                <div class="mt-2">
                                @foreach ($userSkills as $skill)
                                    <span class="badge bg-light text-dark me-2 mb-2">{{$skill->name}}</span>
                                @endforeach
                            </div>
                    </div>
                        </div>
                        <div class="tab-pane fade" id="reviews" role="tabpanel">
                            <h4 class="mb-3">Reviews</h4>
                            <p class="text-muted">Reviews content goes here...</p>
                        </div>
                        <div class="tab-pane fade" id="availability" role="tabpanel">
                            <h4 class="mb-3">Availability</h4>
                            <p class="text-muted">
                                Session Price:{{$user->session_price}}
                            </p>
                            <p>
                            <a href="#" class="text-success text-decoration-none">Book Now</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="bg-white rounded shadow-sm p-4">
                    <h5 class="mb-3">Contact Details</h5>
                    
                    <div class="mb-3">
                        <small class="text-muted text-uppercase">EMAIL ADDRESS:</small>
                        <div class="mt-1">
                            <a href="mailto:{{ $user->email ?? 'hello@nguyen.shane.com' }}" class="text-primary text-decoration-none">
                                {{ $user->email ?? 'hello@nguyen.shane.com' }}
                            </a>
                        </div>
                    </div>
                    <div class="mb-3">
                        <small class="text-muted text-uppercase">Linkedin:</small>
                        <div class="mt-1">
                            <a href="{{ $user->linkedin_url ?: '' }}" class="text-primary text-decoration-none">
                                {{ $user->linkedin_url ?: '' }}
                            </a>
                        </div>
                    </div>
                    <div class="mb-3">
                        <small class="text-muted text-uppercase">Github:</small>
                        <div class="mt-1">
                            <a href="{{ $user->github_url?:'github.com' }}" class="text-danger text-decoration-none">
                                {{ $user->github_url ?: 'github' }}
                            </a>
                        </div>
                    </div>

                    <div class="mb-3">
                        <small class="text-muted text-uppercase">CV:</small>
                        <div class="mt-1">
                            <a href="{{ $user->cv_url?:'' }}" class="text-danger text-decoration-none">
                                {{ $user->cv_url ?: '' }}
                            </a>
                        </div>
                    </div>
                    
                    
                </div>
            </div>
        </div>
    </div>
    </div>


@endsection


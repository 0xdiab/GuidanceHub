@extends('layouts.app')

{{-- Page Name --}}
@section('page_name')
    Profile Settings
@endsection

{{-- Content --}}
@section('content')
    <section class="content profile-section py-4">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    {{-- profile header --}}
                    <div class="profile-header">
                        <div class="row">
                            <div class="col-md-4">
                                {{-- Profile image --}}
                                <div class="profile-image">
                                    <img class="img-fluid" src="{{ asset('image/avatar.jpg') }}"
                                        alt="avatar image">
                                </div>
                                {{-- ./profile-image --}}
                            </div>
                            <div class="col-md-8">
                                {{-- profile-info --}}
                                <div class="profile-info">
                                    <h2>Profile Name</h2>
                                    <span>Position title</span>
                                    <div class="languages">
                                        <p>Speak: English, Arabic</p>
                                    </div>
                                    {{-- social-media --}}
                                    <ul class="social-media">
                                        <li>
                                            <a class="btn btn-danger" href="" target="_blank">test</a>
                                        </li>
                                    </ul>
                                    {{-- ./social-media --}}
                                </div>
                                {{-- ./profile-info --}}
                            </div>
                        </div>
                    </div>
                    {{-- ./profile-header --}}
                </div>
            </div>

            <div class="row">
                <div class="row py-4">
                    <div class="col-md-7 col-sm-12">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
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
                                        {{-- summary --}}
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
                                        {{-- ./summary --}}

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
                        {{-- skills --}}
                        <ul class="skills">
                            <li>JavaScript</li>
                            <li>PHP</li>
                            <li>MySQL</li>
                            <li>HTML</li>
                            <li>Python</li>
                            <li>Laravel</li>
                        </ul>
                        {{-- ./skills --}}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">


                </div>
            </div>


        </div>
    </section>
@endsection

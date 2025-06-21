@extends('layouts.app')

{{-- Page Name --}}
@section('page_name')
    Home
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('libs/Select2/css/select2.min.css') }}" />
@endsection
{{-- Content --}}
@section('content')
    {{-- Homepage --}}
    <section class="home-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-8">
                    {{-- header-section --}}
                    <div class="header-content">
                        {{-- Buttons --}}
                        <div class="buttons">
                            <ul class="nav nav-tabs d-flex justify-content-center" id="myTab" role="tablist">
                                {{-- Find a Mentor --}}
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="home-tab" data-bs-toggle="tab"
                                        data-bs-target="#home-tab-pane" type="button" role="tab"
                                        aria-controls="home-tab-pane" aria-selected="true">Find a Mentor</button>
                                </li>

                                {{-- Become a mentor --}}
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                        data-bs-target="#profile-tab-pane" type="button" role="tab"
                                        aria-controls="profile-tab-pane" aria-selected="false">Become a Mentor</button>
                                </li>
                            </ul>
                            <div class="tab-content text-center" id="myTabContent">
                                <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel"
                                    aria-labelledby="home-tab" tabindex="0">
                                    <h1>Grow Smarter, Not Alone.</h1>
                                    <p>Connect with experts who can help you reach the next level.</p>

                                    {{-- <select id="mySelect">
                                        <option>Choose your specialization</option>
                                        @if ($specializations->count() > 0)
                                            @foreach ($specializations as $specialization)
                                                <option value="{{ $specialization->id }}">
                                                    {{ $specialization->name }}
                                                    <a class=""
                                                        href="{{ route('user.specialization.show', ['id' => $specialization->id]) }}"><i class="fas fa-right-arrow"></i></a>
                                                </option>
                                            @endforeach
                                        @endif
                                    </select> --}}
                                </div>
                                <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel"
                                    aria-labelledby="profile-tab" tabindex="0">
                                    <h1>Your Journey Can Light the Way for Others.</h1>
                                    <p>Join a global community of leaders who give back.</p>

                                    <a class="btn btn-become-mentor" href="{{ route('register') }}">Become a mentor</a>
                                </div>
                            </div>
                        </div>
                        {{-- ./Buttons --}}
                    </div>
                    {{-- header-section --}}
                </div>
            </div>
        </div>
    </section>
    {{-- ./Homepage --}}
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

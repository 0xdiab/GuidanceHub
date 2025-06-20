@extends('layouts.app')

{{-- Page Name --}}
@section('page_name')
    Specializations
@endsection

{{-- Content --}}
@section('content')
    {{-- Specializations --}}
    <section class="content specialization-section py-4">
        <div class="container">
            {{-- Section header --}}
            <div class="section-header text-center py-4">
                <div class="row">
                    <div class="col-12">
                        <div class="header">
                            <h1>{{ $specialization->name }}</h1>
                            <p>"Success is not final, failure is not fatal: It is the courage to continue that counts." –
                                Winston Churchill</p>
                        </div>
                    </div>
                </div>
            </div>
            {{-- ./Section header --}}

            {{-- specialization_details --}}
            <div class="specialization_details py-4">
                <div class="row">

                    @foreach ($mentors as $mentor)
                        <div class="col-md-3">
                            {{-- Card --}}
                            <div class="card mentor-card">
                                {{-- card-header --}}
                                <div class="card-header mentor-card-header p-0">
                                    <img src="{{ asset('image/avatar.jpg') }}" alt="" class="img-fluid">
                                </div>
                                {{-- ./card-header --}}
                                {{-- Card-body --}}
                                <div class="card-body mentor-info text-center">
                                    <a class="" href="{{ route('user.mentor.show', $mentor->id) }}">{{ $mentor->name }}</a>
                                    <p>{{ $mentor->position }}</p>
                                </div>
                                {{-- ./Card-body --}}

                                {{-- card-footer --}}
                                <div class="card-footer">
                                    <form action="{{ route('sessions.book', $mentor->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="specialization_id" value="{{ $specialization->id }}">
                                        <button type="submit" class="btn btn-primary">
                                            Book Now <i class="fa-solid fa-plus"></i>
                                        </button>
                                    </form>
                                    {{-- <a href="{{ route('payment.checkout', $session->id) }}" class="btn">Book Now <i
                                            class="fa-solid fa-plus"></i></a> --}}
                                </div>
                                {{-- ./card-footer --}}
                            </div>
                            {{-- ./Card --}}
                        </div>
                    @endforeach

                </div>
            </div>

            {{-- ./specialization_details --}}
        </div>
    </section>
    {{-- ./Specializations --}}
@endsection

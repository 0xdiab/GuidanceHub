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
            <div class="row">
                <div class="col-12">
                    {{-- specialization header --}}
                    <div class="specialization-header text-center py-4">
                        <h1 class="heading-section">Specializations</h1>
                        <p>Discover our {{ $specializations_count }} categories. Each of them has dozens or even hundred of
                            mentors.</p>
                    </div>
                    {{-- ./specialization-header --}}
                </div>
            </div>

            <div class="specializations">

                <div class="row">
                    @foreach ($specializations as $specialization)
                        <div class="col-md-3 col-6 mb-4">
                            {{-- Card --}}
                            <div class="card specialization shadow-sm p-4">
                                {{-- Card-body --}}
                                <div class="card-body specialization-info text-center">
                                    <a class="" href="{{ route('user.specialization.show', ['id' => $specialization->id]) }}">{{ $specialization->name }}</a>
                                </div>
                                {{-- ./Card-body --}}
                            </div>
                            {{-- ./Card --}}
                        </div>
                    @endforeach

                </div>
            </div>


        </div>
    </section>
    {{-- ./Specializations --}}
@endsection

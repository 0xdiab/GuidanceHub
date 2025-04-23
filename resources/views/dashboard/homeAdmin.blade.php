@extends('layouts.dashboard.app')

{{-- Page name --}}
@section('page_name')
    Home
@endsection

{{-- Remove the breadcrumb from this page --}}
@section('breadcrumb')
@endsection

{{-- main content --}}
@section('main-content')
    {{-- Home section --}}
    <div class="home-section section p-2">
        {{-- Container --}}
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    {{-- Card --}}
                    <div class="card p-4 box box-specializations bg-color-main">
                        {{-- Card body --}}
                        <div class="card-body box-info">
                            <div class="row">
                                <div class="col-6">
                                    {{-- Info --}}
                                    <div class="info">
                                        <a class="text-sm mb-0 text-uppercase font-weight-bold text-decoration-none"
                                        href="">Specializations</a>
                                    </div>
                                </div>
                                <div class="col-6">
                                    {{-- Numbers --}}
                                    <div class="numbers">
                                        <h5 class="font-weight-bolder text-end">34</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- /card-body --}}
                    </div>
                    {{-- /card --}}
                </div>
                <div class="col-md-6">
                    {{-- Card --}}
                    <div class="card p-4 box box-skills bg-color-offwhite">
                        {{-- Card body --}}
                        <div class="card-body box-info">
                            <div class="row">
                                <div class="col-6">
                                    {{-- Info --}}
                                    <div class="info">
                                        <a class="text-sm mb-0 text-uppercase font-weight-bold text-decoration-none"
                                        href="">Skills</a>
                                    </div>
                                </div>
                                <div class="col-6">
                                    {{-- Numbers --}}
                                    <div class="numbers">
                                        <h5 class="font-weight-bolder text-end">34</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- /card-body --}}
                    </div>
                    {{-- /card --}}
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-4">
                    {{-- Card --}}
                    <div class="card p-4 box box-mentors bg-color-light-blue">
                        {{-- Card body --}}
                        <div class="card-body box-info">
                            <div class="row">
                                <div class="col-6">
                                    {{-- Info --}}
                                    <div class="info">
                                        <a class="text-sm mb-0 text-uppercase font-weight-bold text-decoration-none"
                                        href="">Mentors</a>
                                    </div>
                                </div>
                                <div class="col-6">
                                    {{-- Numbers --}}
                                    <div class="numbers">
                                        <h5 class="font-weight-bolder text-end">34</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- /card-body --}}
                    </div>
                    {{-- /card --}}
                </div>
                <div class="col-md-4">
                    {{-- Card --}}
                    <div class="card p-4 box box-mentees bg-color-orange">
                        {{-- Card body --}}
                        <div class="card-body box-info">
                            <div class="row">
                                <div class="col-6">
                                    {{-- Info --}}
                                    <div class="info">
                                        <a class="text-sm mb-0 text-uppercase font-weight-bold text-decoration-none"
                                        href="">Mentees</a>
                                    </div>
                                </div>
                                <div class="col-6">
                                    {{-- Numbers --}}
                                    <div class="numbers">
                                        <h5 class="font-weight-bolder text-end">34</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- /card-body --}}
                    </div>
                    {{-- /card --}}
                </div>
                <div class="col-md-4">
                    {{-- Card --}}
                    <div class="card p-4 box box-admins bg-color-dark">
                        {{-- Card body --}}
                        <div class="card-body box-info">
                            <div class="row">
                                <div class="col-6">
                                    {{-- Info --}}
                                    <div class="info">
                                        <a class="text-sm mb-0 text-uppercase font-weight-bold text-decoration-none"
                                        href="">Admins</a>
                                    </div>
                                </div>
                                <div class="col-6">
                                    {{-- Numbers --}}
                                    <div class="numbers">
                                        <h5 class="font-weight-bolder text-end">34</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- /card-body --}}
                    </div>
                    {{-- /card --}}
                </div>
            </div>
        </div>
        {{-- End of Container --}}

    </div>
    {{-- Home section --}}
@endsection

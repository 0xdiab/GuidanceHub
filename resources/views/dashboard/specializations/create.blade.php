@extends('layouts.dashboard.app')

{{-- Page name --}}
@section('page_name')
    Add a new specializations
@endsection

{{-- breadcrumb-item --}}
@section('breadcrumb-items')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.specializations.index') }}">Specializations</a></li>
    <li class="breadcrumb-item active" aria-current="page">Create a new specializations</li>
@endsection

{{-- Main Content --}}
@section('main-content')
    {{-- specializations section --}}
    <section class="section specializations-section form-page py-4">
        {{-- Container --}}
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-7">
                    {{-- card-form --}}
                    <div class="card card-form card-data">
                        {{-- Card-header --}}
                        <div class="card-header">
                            <h4 class="heading m-0 p-2">Create a new specializations</h4>
                        </div>
                        {{-- card-body --}}
                        <div class="card-body">
                            <div class="form-content">
                                <form action="{{ route('dashboard.specializations.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name" id="name"
                                            placeholder="Type the name of specializations">
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
    {{-- end of specializations section --}}
@endsection

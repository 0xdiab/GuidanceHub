@extends('layouts.dashboard.app')

{{-- Page name --}}
@section('page_name')
    Add a new skill
@endsection

{{-- breadcrumb-item --}}
@section('breadcrumb-items')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.skills.index') }}">Skills</a></li>
    <li class="breadcrumb-item active" aria-current="page">Create a new skill</li>
@endsection

{{-- Main Content --}}
@section('main-content')
    {{-- Skill section --}}
    <section class="section skill-section form-page py-4">
        {{-- Container --}}
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-7">
                    {{-- card-form --}}
                    <div class="card card-form">
                        {{-- Card-header --}}
                        <div class="card-header">
                            <h4 class="heading m-0 p-2">Create a new skill</h4>
                        </div>
                        {{-- card-body --}}
                        <div class="card-body p-4">
                            <div class="form-content">
                                <form action="{{ route('dashboard.skills.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name" id="name"
                                            placeholder="Type the name of skill">
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
    {{-- end of skill section --}}
@endsection

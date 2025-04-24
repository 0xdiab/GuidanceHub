@extends('layouts.dashboard.app')

{{-- Page name --}}
@section('page_name')
    Mentors
@endsection

{{-- breadcrumb-item --}}
@section('breadcrumb-items')
    <li class="breadcrumb-item active" aria-current="page">Mentors</li>
@endsection

{{-- Styles --}}
@section('styles')
    <link rel="stylesheet" href="{{ asset('libs/DataTables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/DataTables/dataTables.dataTables.css') }}">
@endsection


{{-- Main Content --}}
@section('main-content')
    {{-- mentor section --}}
    <section class="section mentor-section py-4">
        {{-- Container --}}
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-10 col-md-10">
                    {{-- Card --}}
                    <div class="card card-data">
                        {{-- Card Header --}}
                        <div class="card-header">
                            <div class="row">
                                <div class="col-6">
                                    <h1>All mentors</h1>
                                </div>
                                <div class="col-6 text-end">
                                    <a class="btn d-inline-block btn-create" href="{{route('dashboard.mentors.create')}}">
                                        <i class="fas fa-plus"></i>
                                        Create
                                    </a>
                                </div>
                            </div>
                        </div>
                        {{-- ./Card Header --}}
                        {{-- Card body --}}
                        <div class="card-body">
                            <table id="example" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Account Type</th>
                                        <th>Gender</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $id = 1;
                                    @endphp
                                    @if ($mentors->count() > 0)
                                        @foreach ($mentors as $mentor)
                                        <tr>
                                            <td>{{ $id++ }}</td>
                                            <td>{{$mentor->name}}</td>
                                            <td>{{$mentor->email}}</td>
                                            <td>{{$mentor->account_type}}</td>
                                            <td>{{$mentor->gender}}</td>
                                            <td>
                                                <a class="btn d-inline-block btn-edit me-1" href="{{route('dashboard.mentors.edit', ['id' => $mentor->id])}}">
                                                    <i class="fas fa-edit"></i>
                                                    Edit
                                                </a>
                                                <form class="d-inline-block ms-1" action="{{route('dashboard.mentors.destroy', ['id' => $mentor->id])}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-delete" type="submit">
                                                        <i class="fas fa-trash"></i>
                                                        Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    @endif

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Account Type</th>
                                        <th>Gender</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        {{-- ./Card body --}}
                    </div>
                    {{-- ./Card --}}
                </div>
            </div>
        </div>
    </section>
@endsection

{{-- Script --}}
@section('scripts')
    <script src="{{ asset('libs/DataTables/datatables.min.js') }}"></script>
    <script src="{{ asset('libs/DataTables/jquery.js') }}"></script>
    <script src="{{ asset('libs/DataTables/dataTable.js') }}"></script>
    <script>
            $(document).ready(function() {
        new DataTable('#example');
    });
    </script>
@endsection

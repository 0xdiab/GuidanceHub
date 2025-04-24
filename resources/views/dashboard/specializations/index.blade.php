@extends('layouts.dashboard.app')

{{-- Page name --}}
@section('page_name')
    Specializations
@endsection

{{-- breadcrumb-item --}}
@section('breadcrumb-items')
    <li class="breadcrumb-item active" aria-current="page">Specializations</li>
@endsection

{{-- Styles --}}
@section('styles')
    <link rel="stylesheet" href="{{ asset('libs/DataTables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/DataTables/dataTables.dataTables.css') }}">
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.css"> --}}
@endsection


{{-- Main Content --}}
@section('main-content')
    {{-- specializations section --}}
    <section class="section specializations-section py-4">
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
                                    <h1>All Specializations</h1>
                                </div>
                                <div class="col-6 text-end">
                                    <a class="btn d-inline-block btn-create" href="{{route('dashboard.specializations.create')}}">
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
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $id = 1;
                                    @endphp
                                    @if ($specializations->count() > 0)
                                        @foreach ($specializations as $skill)
                                        <tr>
                                            <td>{{ $id++ }}</td>
                                            <td>{{$skill->name}}</td>
                                            <td>
                                                <a class="btn d-inline-block btn-edit me-1" href="{{route('dashboard.specializations.edit', ['id' => $skill->id])}}">
                                                    <i class="fas fa-edit"></i>
                                                    Edit
                                                </a>
                                                <form class="d-inline-block ms-1" action="{{route('dashboard.specializations.destroy', ['id' => $skill->id])}}" method="POST">
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

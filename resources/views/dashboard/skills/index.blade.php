@extends("layouts.dashboard.app")

{{-- Page name --}}
@section("page_name") Skills @endsection

{{-- breadcrumb-item --}}
@section('breadcrumb-items')
    <li class="breadcrumb-item active" aria-current="page">Skills</li>
@endsection

{{-- Styles --}}
@section('styles')
    <link rel="stylesheet" href="{{ asset('libs/DataTables/datatables.min.css') }}">
@endsection


{{-- Main Content --}}
@section('main-content')
    
@endsection

{{-- Script --}}
@section('script')
    <script src="{{ asset('libs/DataTables/datatables.min.js') }}"></script>
@endsection

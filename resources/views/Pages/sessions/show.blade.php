@extends('layouts.app')

{{-- Page Name --}}
@section('page_name')
    Session
@endsection

{{-- Content --}}
@section('content')
    {{-- Sessions --}}
    <section class="content session-section py-4">
        <div class="container">
            
            <h2>Session Details</h2>
    <p><strong>Mentor:</strong> {{ $session->mentor->name }}</p>
    <p><strong>Mentee:</strong> {{ $session->mentee->name }}</p>
    <p><strong>Time:</strong> {{ $session->session_time }}</p>
    <p><strong>Status:</strong> {{ ucfirst($session->status) }}</p>
    <p><strong>Paid:</strong> {{ $session->is_paid ? 'Yes' : 'No' }}</p>
    <a href="{{ route('user.home') }}" class="btn btn-primary">Back Home</a>

        </div>
    </section>
    {{-- ./Sessions --}}
@endsection

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


            {{-- ✅ Zoom Link --}}
            @if ($session->session_link)
                <p><strong>Zoom Link:</strong>
                    <a href="{{ $session->session_link }}" target="_blank" class="btn btn-success">
                        Join Session
                    </a>
                </p>
            @endif

            <a href="{{ route('user.home') }}" class="btn btn-primary">Back Home</a>

        </div>
    </section>
    {{-- ./Sessions --}}
@endsection

@extends('layouts.app')

{{-- Page Name --}}
@section('page_name')
    Specializations
@endsection

{{-- Content --}}
@section('content')
    {{-- session-pendin-gpage --}}
    <section class="session-pending-section py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-8">
                    
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-6">
                    {{-- Heading --}}
                    <div class="heading text-center mb-4">
                        <h2>Your session pending</h2>
                    </div>
                    @if ($sessions->count() > 0)
                        @foreach ($sessions as $session)
                            {{-- Sessions-pending-card --}}
                            <div class="sessions-pending-card card rounded shadow-sm mb-3">
                                <div class="card-body">
                                    <p><strong>Mentor:</strong> {{ $session->mentor->name }}</p>
                                    <p><strong>Time:</strong> {{ $session->session_time }}</p>
                                    <p><strong>Status:</strong> {{ ucfirst($session->status) }}</p>
                                </div>
                            </div>
                            {{-- ./Sessions-pending-card --}}
                        @endforeach
                    @else
                        <p>You have no pending sessions</p>
                    @endif
                </div>
            </div>
        </div>
    </section>
    {{-- ./session-pendin-gpage --}}
@endsection
{{-- ./Content --}}

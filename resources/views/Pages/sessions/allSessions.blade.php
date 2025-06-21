@extends('layouts.app')

{{-- Page Name --}}
@section('page_name')
    Your session
@endsection

{{-- Content --}}
@section('content')
    {{-- session-pendin-gpage --}}
    <section class="session-section session-page py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    {{-- Heading --}}
                    <div class="heading text-center mb-5">
                        <h2>All your session</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-7">
                    {{-- Approved --}}
                    @if ($zoomSessions->count() > 0)
                        <div class="sessions-confirmed rounded shadow-sm mb-3">
                            {{-- Heading --}}
                            <div class="heading text-center mb-4">
                                <h4>Your zoom session</h4>
                            </div>
                            @foreach ($zoomSessions as $session)
                                {{-- Sessions-Confirmed-card --}}
                                <div class="sessions-confirmed-card card rounded shadow-sm mb-3">
                                    {{-- Card-body --}}
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                {{-- details --}}
                                                <div class="details">
                                                    <p><strong>Mentor:</strong> {{ $session->mentor->name }}</p>
                                                    <p><strong>Specialization:</strong> {{ $session->specialization->name }}
                                                    </p>
                                                    <p><strong>Time:</strong>
                                                        {{ $session->session_time->format('d M Y - h:i A') }}</p>
                                                    <p><strong>Status:</strong> {{ ucfirst($session->status) }}</p>
                                                    <p><strong>Paid:</strong>
                                                        {{ $session->is_paid == 1 ? 'Yes' : 'No' }}</p>

                                                    {{-- buttons --}}
                                                    <div class="buttons mt-3">
                                                        <div class="row">
                                                            <div class="col-6">
                                                                {{-- Zoom Link --}}
                                                                @if ($session->session_link === null || $session->session_link !== 'TBD')
                                                                    <a href="{{ $session->session_link }}" target="_blank"
                                                                        class="btn btn-dark">
                                                                        Join Session
                                                                    </a>
                                                                @endif
                                                            </div>
                                                            <div class="col-6 text-end">
                                                                @if ($session->session_link === null || $session->session_link !== 'TBD')
                                                                    {{-- Review --}}
                                                                    <a href="{{ route('review.create', $session->id) }}"
                                                                        target="_blank" class="btn btn-review">
                                                                        Leave a Review
                                                                    </a>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                {{-- ./Sessions-pending-card --}}
                            @endforeach
                        </div>
                    @else
                        <div class="card rounded shadow-sm mb-3">
                            <div class="card-body">
                                <p class="m-0">You have no zoom sessions</p>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="col-5">
                    {{-- Approved --}}
                    @if ($approvedSessions->count() > 0)
                        <div class="sessions-confirmed rounded shadow-sm mb-3">
                            {{-- Heading --}}
                            <div class="heading text-center mb-4">
                                <h4>Your session approved</h4>
                                <p>You should pay now</p>
                            </div>
                            @foreach ($approvedSessions as $session)
                                {{-- Sessions-Confirmed-card --}}
                                <div class="sessions-confirmed-card card rounded shadow-sm mb-3">
                                    {{-- Card-body --}}
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                {{-- details --}}
                                                <div class="details">
                                                    <p><strong>Mentor:</strong> {{ $session->mentor->name }}</p>
                                                    <p><strong>Specialization:</strong> {{ $session->specialization->name }}
                                                    </p>
                                                    <p><strong>Time:</strong>
                                                        {{ $session->session_time->format('d M Y - h:i A') }}</p>
                                                    <p><strong>Status:</strong> {{ ucfirst($session->status) }}</p>
                                                    <p><strong>Paid:</strong>
                                                        {{ $session->is_paid == 0 ? 'No' : 'True' }}</p>
                                                    {{-- buttons --}}
                                                    <div class="buttons">
                                                        <a href="{{ route('payment.checkout', $session->id) }}"
                                                            class="btn btn-success ml-2">
                                                            Pay Now
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 d-flex justify-content-end align-items-center">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- ./Sessions-pending-card --}}
                            @endforeach
                        </div>
                    @else
                        <div class="card rounded shadow-sm mb-3">
                            <div class="card-body">
                                <p class="m-0">You have no approved sessions</p>
                            </div>
                        </div>
                    @endif

                    {{-- Pending --}}
                    @if ($pendingSessions->count() > 0)
                        <div class="sessions-pending rounded shadow-sm mb-3">
                            {{-- Heading --}}
                            <div class="heading text-center mb-4">
                                <h4>Your session pending</h4>
                            </div>
                            @foreach ($pendingSessions as $session)
                                {{-- Sessions-pending-card --}}
                                <div class="sessions-pending-card card rounded shadow-sm mb-3">
                                    {{-- Card-body --}}
                                    <div class="card-body">
                                        <p><strong>Mentor:</strong> {{ $session->mentor->name }}</p>
                                        <p><strong>Specialization:</strong> {{ $session->specialization->name }}</p>
                                        <p><strong>Time:</strong> {{ $session->session_time->format('d M Y - h:i A') }}</p>
                                        <p><strong>Status:</strong> {{ ucfirst($session->status) }}</p>
                                    </div>
                                </div>
                                {{-- ./Sessions-pending-card --}}
                            @endforeach
                        </div>
                    @else
                        <div class="card rounded shadow-sm mb-3">
                            <div class="card-body">
                                <p class="m-0">You have no pending sessions</p>
                            </div>
                        </div>
                    @endif

                    {{-- Coancelled --}}
                    @if ($cancelledSessions->count() > 0)
                        <div class="sessions-cancelled rounded shadow-sm mb-3">
                            {{-- Heading --}}
                            <div class="heading text-center mb-4">
                                <h4>Your session cancelled</h4>
                            </div>
                            @foreach ($cancelledSessions as $session)
                                {{-- Sessions-cancelled-card --}}
                                <div class="sessions-cancelled-card card rounded shadow-sm mb-3">
                                    {{-- Card-body --}}
                                    <div class="card-body">
                                        <p><strong>Mentor:</strong> {{ $session->mentor->name }}</p>
                                        <p><strong>Specialization:</strong> {{ $session->specialization->name }}</p>
                                        <p><strong>Time:</strong> {{ $session->session_time->format('d M Y - h:i A') }}</p>
                                        <p><strong>Status:</strong> {{ ucfirst($session->status) }}</p>
                                    </div>
                                </div>
                                {{-- ./Sessions-cancelled-card --}}
                            @endforeach

                        </div>
                    @else
                        <div class="card rounded shadow-sm mb-3">
                            <div class="card-body">
                                <p class="m-0">You have no cancelled sessions</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    {{-- ./session-pendin-gpage --}}
@endsection
{{-- ./Content --}}

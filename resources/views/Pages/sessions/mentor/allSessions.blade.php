@extends('layouts.app')

{{-- Page Name --}}
@section('page_name')
    Your session
@endsection

{{-- Content --}}
@section('content')


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

            <div class="row">
                <div class="col-7">
                    {{-- confirmedSessionsWithLink --}}
                    @if ($confirmedSessionsWithLink->count() > 0)
                        <div class="sessions-confirmed rounded shadow-sm mb-3">
                            {{-- Heading --}}
                            <div class="heading text-center mb-4">
                                <h4>Your session</h4>
                            </div>
                            @foreach ($confirmedSessionsWithLink as $session)
                                {{-- Sessions-Confirmed-card --}}
                                <div class="sessions-confirmed-card card rounded shadow-sm mb-3">
                                    {{-- Card-body --}}
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="row">
                                                    <div class="col-6">
                                                        {{-- details --}}
                                                        <div class="details">
                                                            <p><strong>Mentee:</strong> {{ $session->mentee->name }}</p>
                                                            <p><strong>Specialization:</strong>
                                                                {{ $session->specialization->name }}</p>
                                                            <p><strong>Session Time:</strong>
                                                                {{ $session->session_time->format('d M Y - h:i A') }}</p>
                                                            <p><strong>Status:</strong> {{ ucfirst($session->status) }}</p>
                                                            <p><strong>Paid:</strong> {{ $session->is_paid ? 'Yes' : 'No' }}
                                                            </p>
                                                            {{-- buttons --}}
                                                            <div class="buttons">
                                                                {{-- Zoom Link --}}
                                                                @if ($session->session_link)
                                                                    <a href="{{ $session->session_link }}" target="_blank"
                                                                        class="btn btn-primary">
                                                                        Join Session
                                                                    </a>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 d-flex justify-content-end align-items-center">

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- ./Sessions-pending-card --}}
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="card rounded shadow-sm mb-3">
                            <div class="card-body">
                                <p class="m-0">You have no sessions</p>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="col-5">
                    {{-- confirmedSessionsWithoutLink --}}
                    @if ($confirmedSessionsWithoutLink->count() > 0)
                        <div class="sessions-confirmed rounded shadow-sm mb-3">
                            {{-- Heading --}}
                            <div class="heading text-center mb-4">
                                <h4>You should create link</h4>
                            </div>
                            @foreach ($confirmedSessionsWithoutLink as $session)
                                {{-- Sessions-Confirmed-card --}}
                                <div class="sessions-confirmed-card card rounded shadow-sm mb-3">
                                    {{-- Card-body --}}
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                {{-- details --}}
                                                <div class="details">
                                                    <p><strong>Mentee:</strong> {{ $session->mentee->name }}</p>
                                                    <p><strong>Specialization:</strong> {{ $session->specialization->name }}
                                                    </p>
                                                    <p><strong>Session Time:</strong>
                                                        {{ $session->session_time->format('d M Y - h:i A') }}</p>
                                                    <p><strong>Status:</strong> {{ ucfirst($session->status) }}</p>
                                                    <p><strong>Paid:</strong> {{ $session->is_paid ? 'Yes' : 'No' }}</p>
                                                </div>
                                                {{-- buttons --}}
                                                <div class="buttons">
                                                    @if (auth()->id() === $session->mentor_id && $session->is_paid && $session->session_link === 'TBD')
                                                        <form action="{{ route('sessions.createZoom', $session->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            <button type="submit" class="btn btn-primary">Create Zoom Link</button>
                                                        </form>
                                                    @endif

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
                                        <p><strong>Mentee:</strong> {{ $session->mentee->name }}</p>
                                        <p><strong>Specialization:</strong> {{ $session->specialization->name }}</p>
                                        <p><strong>Session Time:</strong>
                                            {{ $session->session_time->format('d M Y - h:i A') }}</p>
                                        <p><strong>Status:</strong> {{ ucfirst($session->status) }}</p>
                                        <p><strong>Paid:</strong> {{ $session->is_paid ? 'Yes' : 'No' }}</p>
                                        <form method="POST" action="{{ route('mentor.session.approve', $session->id) }}"
                                            class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-success">Approve</button>
                                        </form>

                                        <form method="POST" action="{{ route('mentor.session.reject', $session->id) }}"
                                            class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-danger">Reject</button>
                                        </form>
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



                    <!--
                        {{-- awaitingPaymentSessions --}}
                        @if ($awaitingPaymentSessions->count() > 0)
    <div class="sessions-cancelled rounded shadow-sm mb-3">
                                {{-- Heading --}}
                                <div class="heading text-center mb-4">
                                    <h4>Your session approved</h4>
                                </div>
                                @foreach ($awaitingPaymentSessions as $session)
    {{-- Sessions-cancelled-card --}}
                                    <div class="sessions-cancelled-card card rounded shadow-sm mb-3">
                                        {{-- Card-body --}}
                                        <div class="card-body">
                                            <p><strong>Mentee:</strong> {{ $session->mentee->name }}</p>
                                            <p><strong>Session Time:</strong> {{ $session->session_time->format('d M Y - h:i A') }}</p>
                                            <p><strong>Status:</strong> {{ ucfirst($session->status) }}</p>
                                            <p><strong>Paid:</strong> {{ $session->is_paid ? 'Yes' : 'No' }}</p>
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
                        -->
                </div>
            </div>
        </div>
    </section>

@endsection
{{-- ./Content --}}

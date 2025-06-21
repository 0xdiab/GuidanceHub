@extends('layouts.app')

{{-- Page Name --}}
@section('page_name')
    Profile Settings
@endsection

{{-- Content --}}
@section('content')

<section class="login-section sign-section  justify-content-center py-3 m-5">
        <div class="content d-flex justify-content-center align-items-center">
            {{-- rating Form --}}
            <div class="login-form">
                <h2 class="text-success">Give a Review</h2>
                <form method="POST" action="{{ route('rating.store') }}">
                    @csrf
                    <input type="hidden" name="session_id" value="{{ $session_id }}">
                    <input type="hidden" name="mentor_id" value="{{ $mentor_id }}">
                    <div>
                        <label class="d-block" for="rating">Select Number from 1 to 5</label>
                        <select class="form-control" name="rating" id="rating" required>
                            @for ($i = 1; $i <= 5; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>

                    <div class="mt-4">
                        <label class="d-block" for="comment">Comment</label>
                        <textarea class="form-control" rows="5" name="comment" id="comment"></textarea>
                    </div>

                        <button class="btn btn-login mt-2" type="submit">
                            {{ __('Save') }}
                        </button>
                    </div>
                </form>

            </div>
            
        </div>

    </section>



@endsection
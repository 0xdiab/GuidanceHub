@extends('layouts.app')

{{-- Page Name --}}
@section('page_name')
    Leave a Review
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('libs/Select2/css/select2.min.css') }}" />
@endsection
{{-- Content --}}
@section('content')
    {{-- Create Review --}}
    <div class="create-reviews py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-8">
                    {{-- header --}}
                    <div class="header">
                        <h2 class="heading-section text-center ">Leave a review</h2>
                    </div>

                    {{-- Form --}}
                    <div class="card form-review rounded shadow-sm my-5">
                        {{-- Card body --}}
                        <div class="card-body">
                            <form action="{{ route('review.store') }}" method="POST">
                                @csrf

                                <input type="hidden" name="session_id" value="{{ $session->id }}">
                                <input type="hidden" name="reviewee_id" value="{{ $reviewee_id }}">

                                <div class="form-group mb-4">
                                    <label for="rating" class="form-label">Rating (1 to 5)</label>
                                    <select name="rating" id="rating" class="form-select" required>
                                        <option value="" disabled selected>Choose rating</option>
                                        @for ($i = 1; $i <= 5; $i++)
                                            <option value="{{ $i }}">{{ $i }}
                                                Star{{ $i > 1 ? 's' : '' }}</option>
                                        @endfor
                                    </select>

                                </div>

                                <div class="form-group mb-4">
                                    <label for="review" class="form-label">Write your review (optional)</label>
                                    <textarea name="review" id="review" rows="5" class="form-control" placeholder="Write your feedback...">{{ old('review') }}</textarea>
                                </div>

                                <div class="text-end">
                                    <button type="submit" class="btn btn-dark">Submit</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- Scripts --}}
@section('scripts')
    <script src="{{ asset('libs/Select2/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('libs/Select2/js/select2.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#mySelect').select2();
        });
    </script>
@endsection

<?php

namespace App\Http\Controllers;

use App\Models\MentorSession;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public function create($session_id)
    {
        $session = MentorSession::find($session_id);
        $user = Auth::user();

        if ($user->id !== $session->mentee_id && $user->id !== $session->mentor_id) {
            return redirect()->route('user.home');
        }

        $existingReview = Review::where('session_id', $session_id)
            ->where('reviewer_id', $user->id)
            ->first();

        if ($existingReview) {
            return back()->with('info', 'You have already submitted a review for this session.');
        }

        $reviewee_id = ($user->id === $session->mentee_id) ? $session->mentor_id : $session->mentee_id;

        return view('Pages.create_review', compact('session', 'reviewee_id'));
    }

    public function store(Request $request)
    {
        // dd($request);
        Review::create([
            'session_id' => $request->session_id,
            'reviewer_id' => auth()->id(),
            'reviewee_id' => $request->reviewee_id,
            'rating' => $request->rating,
            'review' => $request->review,
        ]);

        return redirect()->route('user.home');
    }
}

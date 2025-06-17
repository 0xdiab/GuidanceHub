<?php

namespace App\Http\Controllers;

use App\Models\MentorSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MentorSessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $session = MentorSession::with(['mentor', 'mentee'])->findOrFail($id);

        return view('Pages.sessions.show', compact('session'));
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
    public function bookSession(Request $request, string $mentor_id)
    {
        // dd($request);
        $session = MentorSession::create([
            'mentor_id' => $mentor_id,
            'mentee_id' => Auth::id(),
            'session_time' => now()->addDays(1),
            'session_link'=> 'TBD',
            'status' => 'pending',
            'is_paid' => false,
            'payment_id' => null,
            'meeting_provider' => null,
            'meeting_id' => null,
        ]);

        return redirect()->route('payment.checkout', $session->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

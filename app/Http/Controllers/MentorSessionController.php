<?php

namespace App\Http\Controllers;

use App\Models\MentorSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MentorSessionController extends Controller
{

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $session = MentorSession::with(['mentor', 'mentee'])->findOrFail($id);

        return view('Pages.sessions.show', compact('session'));
    }

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

        return redirect()->route('sessions.pending', ['id' => Auth::id()]);
        // return redirect()->route('payment.checkout', $session->id);
    }

    public function pending()
    {
        // dd($request);
        $menteeId = Auth::id();

        $sessions = MentorSession::with('mentee')
            ->where('mentee_id', $menteeId)
            ->where('status', 'pending')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('Pages.sessions.pending', compact("sessions"));
    }
    

}

<?php

namespace App\Http\Controllers;

use App\Models\MentorSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\ZoomService;

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
            "specialization_id" => $request->specialization_id,
            'session_link' => 'TBD',
            'status' => 'pending',
            'is_paid' => false,
            'payment_id' => null,
            'meeting_provider' => null,
            'meeting_id' => null,
        ]);

        return redirect()->route('sessions.menteeSessions', ['id' => Auth::id()]);
        // return redirect()->route('payment.checkout', $session->id);
    }

    public function menteeSessions()
    {
        $menteeId = Auth::id();

        $sessions = MentorSession::with(['mentee', 'specialization'])
            ->where('mentee_id', $menteeId)
            ->orderBy('created_at', 'desc')
            ->get();

        // Just pending session 
        $pendingSessions = $sessions->filter(function ($session) {
            return $session->status == "pending";
        });

        // Just cancelled session 
        $cancelledSessions = $sessions->filter(function ($session) {
            return $session->status == "cancelled";
        });

        // Just confirmed session without paid
        $confirmedSessions = $sessions->filter(function ($session) {
            return $session->status == "confirmed" &&
                $session->is_paid == 0 &&
                ($session->session_link === 'TBD' || $session->session_link === null);
        });

        // Just paid session without session
        $zoomSessions = $sessions->filter(function ($session) {
            return $session->status == "confirmed" &&
                $session->is_paid == 1 &&
                ($session->session_link !== 'TBD' || $session->session_link !== null);
        });

        return view('Pages.sessions.allSessions', compact("pendingSessions", "confirmedSessions", "cancelledSessions", "zoomSessions"));
        // return ("menteeSessions");
    }

    public function mentorSessions()
    {
        $mentorId = Auth::id();

        $sessions = MentorSession::with(['mentee', 'specialization'])
            ->where('mentor_id', $mentorId)
            ->orderBy('created_at', 'desc')
            ->get();

        // Just pending session 
        $pendingSessions = $sessions->filter(function ($session) {
            return $session->status == "pending";
        });

        // Just confirmed session without paid
        $awaitingPaymentSessions  = $sessions->filter(function ($session) {
            return $session->status == "confirmed" &&
                $session->is_paid == 0 &&
                ($session->session_link === 'TBD' || $session->session_link === null);
        });

        // Need Zoom link
        $confirmedSessionsWithoutLink = $sessions->filter(function ($session) {
            return $session->status === 'confirmed' &&
                $session->is_paid == 1 &&
                ($session->session_link === 'TBD' || $session->session_link === null);
        });

        // Need Zoom link
        $confirmedSessionsWithLink = $sessions->filter(function ($session) {
            return $session->status === 'confirmed' &&
                $session->is_paid == 1 &&
                $session->session_link !== null &&
                $session->session_link !== 'TBD';
        });

        return view('Pages.sessions.mentor.allSessions', compact('pendingSessions', 'awaitingPaymentSessions', 'confirmedSessionsWithLink', 'confirmedSessionsWithoutLink'));
    }


    // public function confirmed()
    // {
    //     $mentorId = Auth::id();

    //     $sessions = MentorSession::with(['mentee'])
    //         ->where('mentor_id', $mentorId)
    //         // ->where('status', 'confirmed')
    //         ->orderBy('created_at', 'desc')
    //         ->get();
    //     return view('Pages.sessions.mentor.index', compact('sessions'));
    // }

    public function approve($id)
    {
        $session = MentorSession::findOrFail($id);

        if ($session->mentor_id !== Auth::id()) {
            abort(403);
        }

        $session->update([
            'status' => 'confirmed',
        ]);

        // Store session ID in session temporarily to show link to mentee later
        // session()->flash('approved_session_id', $session->id);

        return back()->with('success', 'Session approved successfully.');
    }


    public function reject($id)
    {
        $session = MentorSession::findOrFail($id);

        if ($session->mentor_id !== Auth::id()) {
            abort(403); // Unauthorized access
        }

        $session->update([
            'status' => 'cancelled',
        ]);

        return back()->with('info', 'The session has been rejected.');
    }


    public function createZoomLink(Request $request, $session_id)
    {
        $session = MentorSession::findOrFail($session_id);

        // 
        if (!$session->is_paid) {
            return back()->with('error', 'This session is not paid yet.');
        }

        if ($session->session_link !== 'TBD' && $session->session_link !== null) {
            return back()->with('info', 'Zoom meeting already exists.');
        }

        $zoom = new ZoomService();
        $meeting = $zoom->createMeeting(
            'Mentorship with ' . $session->mentor->name,
            $session->session_time
        );

        if (!isset($meeting['join_url'])) {
            return back()->with('error', 'Zoom API Error: ' . json_encode($meeting));
        }

        $session->update([
            'session_link' => $meeting['join_url'],
            'meeting_id' => $meeting['id'],
            'meeting_provider' => 'zoom',
        ]);



        return redirect()->route('sessions.show', $session_id);
    }
}

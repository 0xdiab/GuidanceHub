<?php

namespace App\Http\Controllers;

//use auth;
use App\Models\Rating;
use Illuminate\Http\Request;
use App\Models\MentorSession;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class RatingController extends Controller
{
    public function index($session_id)
    {
        $session = MentorSession::find($session_id);
        $mentor_id = $session->mentor_id;
        $user = Auth::user();
        if($user->id !== $session-> mentee_id){
            return Redirect::route('user.home');
        }
        return view('rating.index', compact('user', 'session_id', 'mentor_id'));
    }
//'session_id' => 'required|exists:mentor_sessions,id',
    public function store(Request $request) {
        $request->validate([    
            'session_id' => 'required|integer',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
        ]);
        
    
        Rating::create([
            'mentor_id' => $request->mentor_id,
            'mentee_id' => auth()->user()->id,
            'session_id' => $request->session_id,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);
    
        return Redirect::route('user.home');
    }
}

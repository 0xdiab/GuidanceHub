<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Specialization;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class MentorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mentors = User::where('account_type', 'mentor')->get();
        return view('dashboard.mentors.index', compact('mentors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $specializations = Specialization::all();
        return view("dashboard.mentors.create", compact('specializations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $mentor = User::create([
            "name"              => $request['name'],
            "email"             => $request['email'],
            "password"          => Hash::make($request['password']),
            "position"          => $request['position'],
            "session_price"     => $request['session_price'],
            "linkedin_url"      => $request['linkedin_url'],
            "x_url"             => $request['twitter_url'],
            "github_url"        => $request['github_url'],
            "cv_url"            => $request['cv_url'],
            "gender"            => $request['gender'],
            "account_type"      => ($request['account_type'] == 1) ? "mentor" : "mentee",
        ]);

        if ($request->has('specializations')) {
            $mentor->specializations()->sync($request->specializations);
        }

        return redirect()->route('dashboard.mentors.index');
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
        $mentor = User::where('account_type', 'mentor')->find($id);
        $specializations = Specialization::all();
        return view("dashboard.mentors.update", compact('mentor', 'specializations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->specializations->count);
        $mentor = User::where('account_type', 'mentor')->find($id);
        $mentor->update([
            "name"              => $request['name'],
            "email"             => $request['email'],
            "password"          => Hash::make($request['password']),
            "position"          => $request['position'],
            "session_price"     => $request['session_price'],
            "linkedin_url"      => $request['linkedin_url'],
            "x_url"             => $request['twitter_url'],
            "github_url"        => $request['github_url'],
            "cv_url"            => $request['cv_url'],
            "gender"            => $request['gender'],
            "account_type"      => ($request['account_type'] == 1) ? "mentor" : "mentee",
        ]);


        if ($request->has('specializations')) {
            $mentor->specializations()->sync($request->specializations);
        }

        return redirect()->back();
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mentor = User::find($id);
        $mentor->delete();
        return redirect()->back();
    }
}

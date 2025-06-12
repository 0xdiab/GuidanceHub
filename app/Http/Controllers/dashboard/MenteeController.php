<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Specialization;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MenteeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mentees = User::where('is_admin', 0)->where('account_type', 'mentee')->get();
        return view('dashboard.mentees.index', compact('mentees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $specializations = Specialization::all();
        return view("dashboard.mentees.create", compact('specializations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $mentee = User::create([
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
            $mentee->specializations()->sync($request->specializations);
        }

        return redirect()->route('dashboard.mentees.store');
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
        $mentee = User::where('account_type', 'mentee')->find($id);
        $specializations = Specialization::all();
        return view("dashboard.mentees.update", compact('mentee', 'specializations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request);
        $mentee = User::where('account_type', 'mentee')->find($id);
        $mentee->update([
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

        return view("dashboard.mentees.update", compact('mentee'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mentee = User::find($id);
        $mentee->delete();
        return redirect()->back();
    }
}

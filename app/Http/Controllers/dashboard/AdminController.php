<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Specialization;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins = User::where('is_admin', 1)->get();
        return view('dashboard.users.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $specializations = Specialization::all();
        return view("dashboard.users.create", compact('specializations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $admin = User::create([
            "name"              => $request['name'],
            "email"             => $request['email'],
            "password"          => Hash::make($request['password']),
            "position"          => $request['position'],
            "is_admin"          => 1,
            "session_price"     => $request['session_price'],
            "linkedin_url"      => $request['linkedin_url'],
            "x_url"             => $request['twitter_url'],
            "github_url"        => $request['github_url'],
            "cv_url"            => $request['cv_url'],
            "gender"            => $request['gender'],
            "account_type"      => "mentor",
        ]);

        if ($request->has('specializations')) {
            $admin->specializations()->sync($request->specializations);
        }

        return redirect()->route('dashboard.admins.index');
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
        $user = User::find($id);
        return view('dashboard.users.update', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        $user->update([
            "name" => $request['name'],
            "email" => $request['email'],
            "password" => Hash::make($request['password']),
            "position" => $request['position'],
            "is_admin" => 1,
            "session_price" => $request['session_price'],
            "linkedin_url" => $request['linkedin_url'],
            "x_url" => $request['twitter_url'],
            "github_url" => $request['github_url'],
            "cv_url" => $request['cv_url'],
            "gender" => $request['gender'],
            "account_type" => "mentor",
        ]);
        return redirect()->route('dashboard.admins.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $admin = User::find($id);
        $admin->delete();
        return redirect()->back();
    }
}

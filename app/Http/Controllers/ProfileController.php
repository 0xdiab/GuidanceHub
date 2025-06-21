<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\MentorSession;
use App\Models\Skill;
use App\Models\Specialization;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('profile.index', compact('user'));
    }
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $specializations = Specialization::all();
        $skills = Skill::all();

        return view('profile.edit', [
            'user' => $request->user(),
            'specializations' => $specializations,
            'skills' => $skills
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // dd($request->user());
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->update([
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
            $request->user()->specializations()->sync($request->specializations);
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('profile_images', 'public');
            $request->user()->update(['image' => basename($image)]);
        }

        if ($request->has('skills')) {
            $request->user()->skills()->sync($request->skills);
        }

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}

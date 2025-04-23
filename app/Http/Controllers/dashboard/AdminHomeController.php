<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use App\Models\Specialization;
use App\Models\User;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skillsCount = Skill::count();
        $specializationsCount = Specialization::count();
        $adminsCount = User::where('is_admin', 1)->count();
        $mentorsCount = User::where('account_type', 'mentor')->count();
        $menteesCount = User::where('account_type', 'mentee')->count();
        return view("dashboard.homeAdmin", 
                compact('skillsCount', 'specializationsCount', 'adminsCount', 'mentorsCount', 'menteesCount'));
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
}

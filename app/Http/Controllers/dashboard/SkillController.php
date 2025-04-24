<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skills = Skill::all();
        return view('dashboard.skills.index', compact('skills'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.skills.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate on data coming from request
        // $data = $request->validated();

        try
        {
            Skill::create([
                "name" => $request['name']
            ]);
  
            return redirect()->route('dashboard.skills.index');
        }catch(\Exception $e)
        {
            return redirect()->back()->with('error', $e);
        }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Select on skill by id
        $skill = Skill::find($id);
        return view('dashboard.skills.update', compact('skill'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Select on skill by id
        $skill = Skill::find($id);

        $skill->update([
            "name" => $request['name']
        ]);

        return redirect()->route('dashboard.skills.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Select on skill by id
        $skill = Skill::find($id);
        $skill->delete();
        return redirect()->back();
    }
}

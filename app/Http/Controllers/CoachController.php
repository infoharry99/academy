<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coach;

class CoachController extends Controller
{
    // 📌 List
    public function index()
    {
        $coaches = Coach::where('created_by', auth()->id())->latest()->get();

        return view('vendor.coach', compact('coaches'));
    }

    // 📌 Store
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'role' => 'required',
            'speciality' => 'required',
            'experience' => 'required|integer',
        ]);

        Coach::create([
            ...$request->all(),
            'created_by' => auth()->id()
        ]);

        return back()->with('success', 'Coach added');
    }

    // 📌 Update
    public function update(Request $request, $id)
    {
        $coach = Coach::findOrFail($id);

        $coach->update($request->all());

        return back()->with('success', 'Coach updated');
    }

    // 📌 Show (optional for modal view)
    public function show($id)
    {
        return Coach::findOrFail($id);
    }
}
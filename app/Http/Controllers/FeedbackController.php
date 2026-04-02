<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    public function feedbacks()
    {
        $feedbacks = Feedback::with('vendor')
            ->where('user_id', auth()->id())
            ->orderBy('feedback_date', 'desc')
            ->get();

        return view('dashboard.feedback', compact('feedbacks'));
    }
    // 📌 Show feedback for logged-in user
    public function index()
    {
        $feedbacks = Feedback::with('vendor')
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('dashboard.feedbacks', compact('feedbacks'));
    }

    // 📌 Store feedback (vendor side)
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'skill' => 'required|integer|max:10',
            'discipline' => 'required|integer|max:10',
            'fitness' => 'required|integer|max:10',
            'match_performance' => 'required|integer|max:10',
            'comment' => 'nullable|string'
        ]);

        Feedback::create([
            'user_id' => $request->user_id,
            'vendor_id' => auth()->id(),
            'star' => $request->star ?? 5,
            'skill' => $request->skill,
            'discipline' => $request->discipline,
            'fitness' => $request->fitness,
            'match_performance' => $request->match_performance,
            'comment' => $request->comment,
            'feedback_date' => now(),
        ]);

        return back()->with('success', 'Feedback added');
    }
}
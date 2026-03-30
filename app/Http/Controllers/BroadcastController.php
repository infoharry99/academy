<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BroadcastMessage;

class BroadcastController extends Controller
{
    // STORE MESSAGE
    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required',
            'subject' => 'nullable|string|max:255'
        ]);

        $broadcast = BroadcastMessage::create([
            'subject' => $request->subject,
            'message' => $request->message,
            'status' => 'pending'
        ]);

        // 👉 Here you can send message logic later

        // For now mark as sent
        $broadcast->update([
            'status' => 'sent'
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Message stored successfully',
            'data' => $broadcast
        ]);
    }

    // LIST MESSAGES (optional)
    public function index()
    {
        $messages = BroadcastMessage::latest()->get();

        return view('vendor.bordcast', compact('messages'));
    }

     public function userindex()
    {
        $messages = BroadcastMessage::latest()->get();

        return view('dashboard.broadcast', compact('messages'));
    }
}
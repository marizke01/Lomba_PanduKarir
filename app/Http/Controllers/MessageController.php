<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $messages = Message::latest()->get();
        return view('messages.index', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('messages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            // 'user_id' => 'required|exists:users,id', (Nanti Dipakai)
            'user_email' => 'required|email|max:255',
            'content' => 'required|string',
        ]);

        Message::create($validated);
        return redirect()->route('messages.index')->with('success', 'Message sent successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Message $message)
    {
        // return view('messages.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Message $message)
    {
        return view('messages.edit', compact('message'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Message $message)
    {
        $validated = $request->validate([
            // 'user_id' => 'required|exists:users,id', (Nanti Dipakai)
            'user_email' => 'required|email|max:255',
            'content' => 'required|string',
        ]);

        $message->update($validated);
        return redirect()->route('messages.index')->with('success', 'Message updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message)
    {
        $message->delete();
        return redirect()->route('messages.index')->with('success', 'Message deleted successfully.');
    }
}

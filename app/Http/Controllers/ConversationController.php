<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ConversationController extends Controller
{
    public function index(Request $request)
    {
        $conversations = Conversation::where('user_one', Auth::id())
                        ->orWhere('user_two', Auth::id())
                        ->get();

        $messages = collect();

        if ($request->has('conversation_id')) {
            $messages = Message::where('conversation_id', $request->conversation_id)
                        ->with('sender')
                        ->get();
        }

        $users = User::where('id', '!=', Auth::id())->get();

        return view('conversations.index', compact('conversations', 'messages', 'users'));
    }

    public function show($id)
    {
        $messages = Message::where('conversation_id', $id)
                    ->with('sender', 'receiver')
                    ->get();

        return view('conversations.show', compact('messages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'body' => 'required|string',
            'conversation_id' => 'nullable|exists:conversations,id'
        ]);

        if (!$request->conversation_id) {
            $conversation = Conversation::create([
                'user_one' => Auth::id(),
                'user_two' => $request->receiver_id,
            ]);
        } else {
            $conversation = Conversation::find($request->conversation_id);
        }

        $message = Message::create([
            'conversation_id' => $conversation->id,
            'sender_id' => Auth::id(),
            'receiver_id' => $request->receiver_id,
            'body' => $request->body,
        ]);

        return redirect()->route('conversations.index', ['conversation_id' => $conversation->id]);
    }
}

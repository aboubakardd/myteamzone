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
        $conversation = Conversation::find($id);

        if ($conversation->user_one !== Auth::id() && $conversation->user_two !== Auth::id()) {
            abort(403, 'Vous n\'êtes pas autorisé à voir cette conversation.');
        }

        $messages = Message::where('conversation_id', $id)
                    ->with('sender', 'receiver')
                    ->get();

        return view('conversations.show', compact('messages'));

    }

    public function store(Request $request)
{
    $request->validate([
        'receiver_id' => 'required|exists:users,id|not_in:' . Auth::id(),
        'body' => 'required|string',
    ]);

    // Vérifier s'il y a déjà une conversation entre ces deux utilisateurs
    $conversation = Conversation::where(function ($query) use ($request) {
        $query->where('user_one', Auth::id())
              ->where('user_two', $request->receiver_id);
    })->orWhere(function ($query) use ($request) {
        $query->where('user_one', $request->receiver_id)
              ->where('user_two', Auth::id());
    })->first();

    // Si aucune conversation n'existe, en créer une nouvelle
    if (!$conversation) {
        $conversation = Conversation::create([
            'user_one' => Auth::id(),
            'user_two' => $request->receiver_id,
        ]);
    }

    // Créer le message dans la conversation existante ou nouvellement créée
    Message::create([
        'conversation_id' => $conversation->id,
        'sender_id' => Auth::id(),
        'receiver_id' => $request->receiver_id,
        'body' => $request->body,
    ]);

    return redirect()->route('conversations.index', ['conversation_id' => $conversation->id]);
}

    }

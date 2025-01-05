<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index($recipientId)
    {
        $recipient = User::findOrFail($recipientId);
        $chats = Chat::where(function ($query) use ($recipientId) {
            $query->where('user_id', Auth::id())
                  ->where('receiver_id', $recipientId);
        })->orWhere(function ($query) use ($recipientId) {
            $query->where('user_id', $recipientId)
                  ->where('receiver_id', Auth::id());
        })->with('user')->get();

        return view('chat.index', compact('chats', 'recipient'));
    }



    public function send(Request $request)
    {
        Chat::create([
            'user_id' => Auth::id(),
            'receiver_id' => $request->receiver_id,
            'message' => $request->message,
        ]);

        return back()->with('message', 'Message sent successfully.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Avatar;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AvatarController extends Controller
{
    public function index()
    {
        $avatars = Avatar::all();
        $users = User::where('id', '!=', Auth::id())->get();
        return view('avatar.index', compact('avatars', 'users'));
    }


    public function buy(Request $request)
    {
        $user = Auth::user();
        $avatar = Avatar::find($request->avatar_id);

        if ($user->coins < $avatar->price) {
            return back()->withErrors(['message' => 'Insufficient coins to buy this avatar.']);
        }

        $user->coins -= $avatar->price;
        /** @var \App\Models\User $user **/
        $user->avatars()->attach($avatar);
        $user->save();

        return back()->with('message', 'Avatar purchased successfully.');
    }

    public function send(Request $request)
    {
        $avatar = Avatar::find($request->avatar_id);
        $receiver = User::find($request->receiver_id);

        $receiver->avatars()->attach($avatar);

        return back()->with('message', 'Avatar sent successfully.');
    }

    public function collectorsAngels()
    {
        $avatars = Avatar::with('users')->get();

        return view('avatar.collectors-angels', compact('avatars'));
    }
}

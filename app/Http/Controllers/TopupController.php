<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TopupController extends Controller
{
    public function index()
    {
        return view('topup.index');
    }

    public function topup()
    {
        $user = Auth::user();

        $user->coins += 100;
        /** @var \App\Models\User $user **/
        $user->save();

        return back()->with('message', '100 coins added to your wallet!');
    }
}

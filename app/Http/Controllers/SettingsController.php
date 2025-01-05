<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    public function index()
    {
        return view('settings.index');
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        if ($request->visibility === 'hide') {
            if ($user->coins < 50) {
                return back()->withErrors(['message' => 'Insufficient coins to hide profile.']);
            }

            $user->coins -= 50;
            $user->visible = false;
        } else {
            $user->coins -= 5;
            $user->visible = true;
        }
        /** @var \App\Models\User $user **/
        $user->save();
        return back()->with('message', 'Settings updated successfully.');
    }
}

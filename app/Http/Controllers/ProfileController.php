<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function update(Request $request)
{
    $user = Auth::user();

    $request->validate([
        'email' => 'required|email|unique:users,email,' . $user->id,
        'gender' => 'required|in:male,female',
        'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $user->email = $request->email;
    $user->gender = $request->gender;

    if ($request->hasFile('profile_photo')) {
        if ($user->profile_photo) {
            Storage::delete($user->profile_photo);
        }

        $path = $request->file('profile_photo')->store('profile_photos');
        $user->profile_photo = $path;
    }

    /** @var \App\Models\User $user **/
    $user->save();

    return redirect()->back()->with('success', 'Profile updated successfully.');
}
}

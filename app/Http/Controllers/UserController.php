<?php

namespace App\Http\Controllers;

use App\Models\FieldOfWork;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register()
    {
        $fieldsOfWork = FieldOfWork::all();
        return view('user.register', compact('fieldsOfWork'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'gender' => 'required|in:Male,Female',
            'fields_of_work' => 'required|array|min:1',
            'fields_of_work.*' => 'exists:field_of_works,id',
            'linkedin_username' => [
                    'required',
                    'url',
                    'regex:/^https:\/\/(www\.)?linkedin\.com\/in\/[a-zA-Z0-9_-]+$/'
            ],
            'mobile_number' => 'required|numeric|digits_between:10,15',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'gender' => $request->gender,
            'linkedin_username' => $request->linkedin_username,
            'mobile_number' => $request->mobile_number,
            'registration_price' => random_int(100000, 125000),
            'coins' => 100,
            'profile_photo' => 'https://picsum.photos/100/100?random=' . mt_rand(1, 1000),
        ]);
        $user->fieldsOfWork()->attach($request->fields_of_work);

        Auth::login($user);

        return redirect()->route('payment.checkout')->with('user', $user);
    }

    public function login()
    {
        return view('user.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/');
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function profile()
    {
        $user = Auth::user();
        return view('user.profile', compact('user'));
    }

    public function toggleVisibility(Request $request)
    {
        $user = Auth::user();

        if ($user->coins < 50) {
            return back()->withErrors(['message' => 'Insufficient coins to toggle visibility.']);
        }

        $user->coins -= $user->visible ? 50 : 5;
        $user->visible = !$user->visible;
        /** @var \App\Models\User $user **/
        $user->save();

        return back()->with('message', 'Visibility updated successfully.');
    }
}

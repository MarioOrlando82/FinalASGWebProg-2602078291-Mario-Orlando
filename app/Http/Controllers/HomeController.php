<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
{
    $query = User::with('fieldsOfWork')->where('visible', true);

    if ($request->filled('gender') && in_array($request->gender, ['Male', 'Female'])) {
        $query->where('gender', $request->gender);
    }

    if ($request->filled('search')) {
        $query->whereHas('fieldsOfWork', function ($q) use ($request) {
            $q->where('name', 'like', '%' . $request->search . '%');
        });
    }

    $users = $query->get()->map(function ($user) {
        return [
            'id' => $user->id,
            'name' => $user->name,
            'photo' => $user->profile_photo,
            'fields_of_work' => $user->fieldsOfWork->pluck('name')->toArray(),
        ];
    });

    return view('home.index', compact('users'));
}

}

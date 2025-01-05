<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlists = Wishlist::where('user_id', Auth::id())->get();
        return view('wishlist.index', compact('wishlists'));
    }

    public function add(Request $request)
    {
        Wishlist::create(['user_id' => Auth::id(), 'wished_user_id' => $request->wished_user_id]);
        return back()->with('message', 'User added to wishlist.');
    }

    public function remove(Request $request)
    {
        Wishlist::where('user_id', Auth::id())->where('wished_user_id', $request->wished_user_id)->delete();
        return back()->with('message', 'User removed from wishlist.');
    }
}

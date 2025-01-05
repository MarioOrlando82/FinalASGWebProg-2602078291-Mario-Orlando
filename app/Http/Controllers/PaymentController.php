<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function checkout()
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('user.register')->withErrors(['error' => 'Please register before proceeding to payment.']);
        }
        return view('payment.checkout', compact('user'));
    }
    public function process(Request $request)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('user.login')->withErrors(['error' => 'User not found. Please log in before proceeding to payment.']);
        }

        $request->validate([
            'amount' => 'required|numeric|min:1',
        ]);

        $amountPaid = $request->amount;
        $underPaid = $user->registration_price - $amountPaid;
        $overPaid = $amountPaid - $user->registration_price;

        if ($amountPaid < $user->registration_price) {
            return redirect()->back()->withErrors(['error' => "You are still underpaid by $underPaid."]);
        }

        if ($overPaid > 0) {
            session(['overPaid' => $overPaid]);
            return redirect()->route('payment.overpaid');
        }

        Payment::create([
            'user_id' => $user->id,
            'amount_paid' => $amountPaid,
        ]);

        return redirect()->route('home.index')->with('message', 'Payment successful!');
    }
    public function overpaid()
    {
        $overPaid = session('overPaid');
        $user = Auth::user();

        if (!$overPaid || !$user) {
            return redirect()->route('payment.checkout');
        }

        return view('payment.overpaid', compact('overPaid', 'user'));
    }

    public function addToWallet(Request $request)
    {
        $user = Auth::user();
        $overPaid = session('overPaid', 0);

        if (!$user || $overPaid <= 0) {
            return redirect()->route('payment.checkout')->withErrors(['error' => 'Invalid operation.']);
        }

        $user->coins += $overPaid;
        /** @var \App\Models\User $user **/
        $user->save();

        session()->forget('overPaid');

        return redirect()->route('home.index')->with('message', 'Overpaid amount successfully added to your wallet!');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    public function passengers()
    {
        $cart = session('cart');
        if (!$cart || count($cart) == 0) {
            return redirect()->route('home')->with('error', 'Koszyk jest pusty.');
        }

        return view('checkout.passengers');
    }

    public function storePassengers(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
        ]);

        session(['checkout.passenger' => $data]);
        return redirect()->route('checkout.review');
    }

    public function review()
    {
        $cart = session('cart', []);
        $passenger = session('checkout.passenger');

        if (!$cart || !$passenger) {
            return redirect()->route('home')->with('error', 'Brakuje danych.');
        }

        return view('checkout.review', compact('cart', 'passenger'));
    }

    public function pay()
    {
        $cart = session('cart');
        $passenger = session('checkout.passenger');

        if (!$cart || !$passenger) {
            return redirect()->route('home')->with('error', 'Brakuje danych.');
        }

        $reservationId = strtoupper(Str::random(8));

        session()->forget(['cart', 'checkout.passenger']);
        session(['confirmation' => $reservationId]);

        return redirect()->route('checkout.success');
    }

    public function success()
    {
        $id = session('confirmation');
        if (!$id) return redirect()->route('home');
        return view('checkout.success', compact('id'));
    }
}


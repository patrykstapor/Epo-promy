<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request): RedirectResponse
    {
        $request->validate([
            'from' => 'required|string',
            'to' => 'required|string',
            'date' => 'required|date',
            'depart' => 'required|string',
            'arrive' => 'required|string',
            'operator' => 'required|string',
            'price' => 'required|numeric',
        ]);

        $cart = session()->get('cart', []);
        $cart[] = $request->only(['from', 'to', 'date', 'depart', 'arrive', 'operator', 'price']);
        session(['cart' => $cart]);

        return redirect()->route('cart.index')->with('success', 'Rejs dodany do koszyka.');
    }

    public function index()
    {
        $cart = session('cart', []);
        return view('cart', compact('cart'));
    }

    public function remove(Request $request)
    {
        $index = $request->input('index');
        $cart = session('cart', []);
        unset($cart[$index]);
        session(['cart' => array_values($cart)]);
        return back()->with('success', 'Rejs usunięty.');
    }



}

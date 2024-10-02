<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::with('cartItems')->get();
        return view('admin-dashboard.carts.index', compact('carts'));
    }

    public function create()
    {
        return view('carts.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'is_checkout' => 'required|boolean',
        ]);

        Cart::create($validatedData);
        return redirect()->route('carts.index')->with('success', 'Cart created successfully.');
    }

    public function edit(string $id)
    {
        return view('carts.edit', compact('cart'));
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'is_checkout' => 'required|boolean',
        ]);

        $cart = Cart::find($request->id);
        $cart->update($validatedData);
        return redirect()->route('carts.index')->with('success', 'Cart updated successfully.');
    }

    public function destroy(string $id)
    {
        $cart = Cart::find($id);
        $cart->delete();
        return redirect()->route('carts.index')->with('success', 'Cart deleted successfully.');
    }
}

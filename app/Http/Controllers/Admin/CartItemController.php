<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use Illuminate\Http\Request;

class CartItemController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'cart_id' => 'required|exists:carts,id',
            'product_id' => 'required|exists:products,id',
        ]);

        CartItem::create($request->all());
        return redirect()->route('carts.index')->with('success', 'Cart item added successfully.');
    }

    public function update(Request $request, CartItem $cartItem)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $cartItem->update($request->all());
        return redirect()->route('carts.index')->with('success', 'Cart item updated successfully.');
    }

    public function destroy(CartItem $cartItem)
    {
        $cartItem->delete();
        return redirect()->route('carts.index')->with('success', 'Cart item deleted successfully.');
    }
}

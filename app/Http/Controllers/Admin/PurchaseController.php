<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Purchase;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function index()
    {
        $viewData = [
            'title' => 'Purchase Management',
            'activePage' => 'purchases',
            'purchases' => Purchase::with(['cart', 'user'])->get(),
        ];
        return view('admin-dashboard.purchases.index', $viewData);
    }

    public function create()
    {
        $viewData = [
            'title' => 'Create New Purchase',
            'activePage' => 'purchases',
        ];
        return view('admin-dashboard.purchases.create', $viewData);
    }

    public function store(Request $request)
    {
        // Create carts first
        $cart = Cart::create([
            'user_id' => $request->user_id,
            'is_checkout' => true,
        ]);

        // Add item to cartItems
        CartItem::create([
            'cart_id' => $cart->id,
            'product_id' => $request->product_id,
        ]);

        // Create purchase
        Purchase::create([
            'cart_id' => $cart->id,
            'user_id' => $request->user_id,
            'invoice_id' => $request->invoice_id,
            'total_price' => $request->total_price,
            'status' => $request->status,
            'payment_method' => $request->payment_method,
            'payment_status' => $request->payment_status,
        ]);




        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'invoice_id' => 'required|unique:purchases,invoice_id|max:50',
            'total_price' => 'required|numeric',
            'status' => 'required|in:pending,paid,shipped,completed,failed',
            'payment_method' => 'required|string|max:50',
            'payment_status' => 'required|in:pending,success,failed',
        ]);


        Purchase::create($request->all());

        return redirect()->route('purchases.index')->with('success', 'Purchase created successfully.');
    }

    public function edit(string $id)
    {
        $viewData = [
            'title' => 'Edit Purchase',
            'activePage' => 'purchases',
            'purchase' => Purchase::find($id),
        ];
        return view('admin-dashboard.purchases.edit',$viewData);
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'cart_id' => 'required|exists:carts,id',
            'user_id' => 'required|exists:users,id',
            'invoice_id' => 'required|unique:purchases,invoice_id,' . $request->id . '|max:50',
            'total_price' => 'required|numeric',
            'status' => 'required|in:pending,paid,shipped,completed,failed',
            'payment_method' => 'required|string|max:50',
            'payment_status' => 'required|in:pending,success,failed',
        ]);

        $purchase = Purchase::find($request->id);

        $purchase->update($validatedData);

        return redirect()->route('purchases.index')->with('success', 'Purchase updated successfully.');
    }

    public function destroy(string $id)
    {
        $purchase = Purchase::find($id);
        $purchase->delete();

        return redirect()->route('purchases.index')->with('success', 'Purchase deleted successfully.');
    }
}

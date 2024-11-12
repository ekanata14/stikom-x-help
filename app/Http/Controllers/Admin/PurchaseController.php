<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

// Models
use App\Models\Purchase;
use App\Models\Product;
use App\Models\Cart;
use App\Models\CartItem;

class PurchaseController extends Controller
{
    public function index()
    {
        $viewData = [
            'title' => 'Purchase Management',
            'activePage' => 'purchases',
            'purchases' => Purchase::with(['cart', 'user'])->orderByDesc('created_at')->paginate(10),
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

    public function userPurchase()
    {
        $viewData = [
            'title' => 'Purchase',
            'activePage' => 'purchases',
            'product' => Product::where('user_type_id', Auth::user()->id_user_type)->first(),
        ];
        return view('user-dashboard.purchase', $viewData);
    }

    public function userUploadReceipt(string $id)
    {
        $viewData = [
            'title' => 'Upload Receipt',
            'activePage' => 'purchases',
            'purchase' => Purchase::where('id', '=', $id)->with('cart.cartItems.product')->first(),
        ];
        return view('user-dashboard.receipt', $viewData);
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

        // Create invoice formatting
        $invoice = 'INV-' . date('Ymd') . '-' . $cart->id;

        // Create purchase
        $purchase = Purchase::create([
            'cart_id' => $cart->id,
            'user_id' => $request->user_id,
            'invoice_id' => $invoice,
            'currency' => $request->currency,
            'total_price' => $request->total_price,
            'status' => $request->status,
            'payment_method' => $request->payment_method,
            'payment_status' => $request->payment_status,
        ]);

        // $validatedData = $request->validate([
        //     'user_id' => 'required|exists:users,id',
        //     'invoice_id' => 'required|unique:purchases,invoice_id|max:50',
        //     'total_price' => 'required|numeric',
        //     'status' => 'required|in:pending,paid,shipped,completed,failed',
        //     'payment_method' => 'required|string|max:50',
        //     'payment_status' => 'required|in:pending,success,failed',
        // ]);


        // Purchase::create($request->all());

        return redirect()->route('user.purchase.upload.receipt', $purchase->id)->with('success', 'Purchase created successfully. Upload your receipt.');
    }

    public function uploadReceipt(Request $request)
    {
        $purchase = Purchase::find($request->id);
        $request->validate([
            'payment_receipt' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $imageName = time() . '.' . $request->payment_receipt->extension();
        $request->payment_receipt->storeAs('receipts', $imageName, ['disk', 'private']);

        $purchase->payment_status = 'success';
        $purchase->payment_receipt = $imageName;
        $purchase->save();

        return redirect()->route('user.dashboard', $purchase->id)->with('success', 'Receipt uploaded successfully. Welcome to your dashboard.');
    }

    public function showReceipt(string $id)
    {
        $purchase = Purchase::find($id);
        // Cek apakah file ada di storage
        if (Storage::disk('private')->exists('receipts/' . $purchase->payment_receipt)) {
            // Jika file ditemukan, tampilkan sebagai response download
            return Storage::disk('private')->download('receipts/' . $purchase->payment_receipt);
        } else{
            return 0;
        }

        // Jika file tidak ditemukan, kembalikan response error
        // return back()->with('error', 'Receipt not found.');
    }

    public function download(string $id)
    {
        $purchase = Purchase::find($id);
        if (Storage::disk('private')->exists('receipts/' . $purchase->payment_receipt)) {
            // Mendapatkan path file
            $path = Storage::disk('private')->path('receipts/' . $purchase->payment_receipt);

            // Mengembalikan response untuk menampilkan gambar
            return response()->file($path);
        }

        return back()->with('error', 'Receipt not found.');
    }

    public function verify(Request $request)
    {
        $purchase = Purchase::find($request->id);
        $purchase->status = 'paid';
        $purchase->save();

        return back()->with('success', 'Purchase verified successfully.');
    }

    public function unverify(Request $request)
    {
        $purchase = Purchase::find($request->id);
        $purchase->status = 'pending';
        $purchase->save();

        return back()->with('success', 'Purchase unverified successfully.');
    }

    public function cancel(Request $request)
    {
        $purchase = Purchase::find($request->id);
        $purchase->status = 'cancelled';
        $purchase->payment_status = 'failed';
        $purchase->save();

        return back()->with('success', 'Purchase canceled successfully.');
    }

    public function uncancel(Request $request)
    {
        $purchase = Purchase::find($request->id);
        $purchase->status = 'pending';
        $purchase->payment_status = 'success';
        $purchase->save();

        return back()->with('success', 'Purchase uncanceled successfully.');
    }

    public function edit(string $id)
    {
        $viewData = [
            'title' => 'Edit Purchase',
            'activePage' => 'purchases',
            'purchase' => Purchase::find($id),
        ];
        return view('admin-dashboard.purchases.edit', $viewData);
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

        return back()->with('success', 'Purchase updated successfully.');
    }

    public function destroy(string $id)
    {
        $purchase = Purchase::find($id);
        $purchase->delete();

        return back()->with('success', 'Purchase deleted successfully.');
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Models
use App\Models\Purchase;

class CheckPurchase
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Jika user bukan admin (userType id !== 1), lakukan pengecekan pembelian
        $purchase = Purchase::where('user_id', Auth::user()->id)->first();
        $user = Auth::user();

        // Jika user tidak memiliki pembelian, redirect ke halaman pembelian
        if (is_null($purchase)) {
            return redirect()->route('user.purchase')->with('warning', 'You need to make a purchase first.');
        } else if (is_null($purchase->payment_receipt)) {
            return redirect()->route('user.purchase.upload.receipt', $purchase->id)
                ->with('warning', 'Please upload your payment receipt.');
        } else {
            if ($user->id_user_type == 8 && $user->identity_id == NULL) {
                return redirect()->route('users.update.identity-id')->with('warning', 'Please complete your profile data.');
            } else {
                // Jika semua syarat terpenuhi, lanjutkan ke request berikutnya
                return $next($request);
            }
        }
    }
}

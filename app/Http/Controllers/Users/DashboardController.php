<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

// Models
use App\Models\Purchase;

class DashboardController extends Controller
{
    public function index()
    {
        $viewData = [
            'title' => 'Dashboard',
            'activePage' => 'dashboard',
            'purchases' => Purchase::where('user_id', Auth::user()->id)->with('cart.cartItems.product')->get(),
            'qrCode' => QrCode::size(200)->generate(auth()->user()->id),
        ];
        return view('dashboard', $viewData);
    }
}

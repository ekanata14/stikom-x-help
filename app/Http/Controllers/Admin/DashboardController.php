<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Models
use App\Models\User;
use App\Models\Purchase;

class DashboardController extends Controller
{
    public function index(){
        $viewData = [
            'title' => 'Dashboard',
            'activePage' => 'dashboard',
            'totalUsers' => User::where('id_user_type', '!=', '1')->count(),
            'totalPurchases' => Purchase::count(),
            'totalIncomeIDR' => Purchase::where('currency', 'IDR')->sum('total_price'),
            'totalIncomeUSD' => Purchase::where('currency', 'USD')->sum('total_price'),
        ];

        return view('admin-dashboard.dashboard', $viewData);
    }
}

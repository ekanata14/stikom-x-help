<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Purchase;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        // Share the variable with all views
        $pendingPurchasesCount = Purchase::where('status', 'pending')->count();
        View::share('pendingPurchasesCount', $pendingPurchasesCount);
    }
}

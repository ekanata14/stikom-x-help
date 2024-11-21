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
        if (! app()->runningInConsole()) {
            $pendingPurchasesCount = Purchase::all()->count();
            View::share('pendingPurchasesCount', $pendingPurchasesCount);
        }
    }
}

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Admin Controller
use App\Http\Controllers\Admin\CheckInController;

Route::get('/', function(){
    return "test";
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/qr-check', [CheckInController::class, 'processQRCode']);
Route::post('/checkin/store', [CheckInController::class, 'store']);

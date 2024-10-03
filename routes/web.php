<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

// Landing Page Controller
use App\Http\Controllers\LandingPageController;

// Admin
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\UserTypeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CartController;
use App\Http\Controllers\Admin\CartItemController;
use App\Http\Controllers\Admin\PurchaseController;

// User
use App\Http\Controllers\Users\DashboardController as UserDashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [LandingPageController::class, 'index'])->name('home');
Route::get('/accomodation', [LandingPageController::class, 'accomodation'])->name('accomodation');
Route::get('/commitee', [LandingPageController::class, 'commitee'])->name('commitee');
Route::get('/general-info', [LandingPageController::class, 'generalInfo'])->name('general-info');
Route::get('/speakers', [LandingPageController::class, 'speakers'])->name('speakers');
Route::get('/travel', [LandingPageController::class, 'travel'])->name('travel');

Route::middleware(['auth', 'verified', 'AuthAdmin'])->group(function () {

    // Dashboard Routes
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    // User Routes
    Route::get('/users', [UsersController::class, 'index'])->name('users.index');
    Route::get('/users/admin', [UsersController::class, 'admin'])->name('users.admin');
    Route::get('/users/create', [UsersController::class, 'create'])->name('users.create');
    Route::post('/users', [UsersController::class, 'store'])->name('users.store');
    Route::get('/users/{user}', [UsersController::class, 'show'])->name('users.show');
    Route::get('/users/{user}/edit', [UsersController::class, 'edit'])->name('users.edit');
    Route::post('/users/{user}', [UsersController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UsersController::class, 'destroy'])->name('users.destroy');

    // User Type Routes
    Route::get('/user-types', [UserTypeController::class, 'index'])->name('user-types.index');
    Route::get('/user-types/create', [UserTypeController::class, 'create'])->name('user-types.create');
    Route::post('/user-types', [UserTypeController::class, 'store'])->name('user-types.store');
    Route::get('/user-types/edit/{id}', [UserTypeController::class, 'edit'])->name('user-types.edit');
    Route::post('/user-types/update', [UserTypeController::class, 'update'])->name('user-types.update');
    Route::delete('/user-types/{id}', [UserTypeController::class, 'destroy'])->name('user-types.destroy');

    // Cart Routes
    Route::get('carts', [CartController::class, 'index'])->name('carts.index');      // Menampilkan semua carts
    Route::get('carts/create', [CartController::class, 'create'])->name('carts.create'); // Form untuk membuat cart baru
    Route::post('carts', [CartController::class, 'store'])->name('carts.store');      // Menyimpan cart baru
    Route::get('carts/{cart}/edit', [CartController::class, 'edit'])->name('carts.edit'); // Form untuk edit cart
    Route::post('carts/{cart}', [CartController::class, 'update'])->name('carts.update');  // Memperbarui data cart
    Route::delete('carts/{cart}', [CartController::class, 'destroy'])->name('carts.destroy'); // Menghapus cart

    // CartItem Routes
    Route::post('cart-items', [CartItemController::class, 'store'])->name('cart-items.store'); // Menambah item ke cart
    Route::post('cart-items/{cartItem}', [CartItemController::class, 'update'])->name('cart-items.update'); // Memperbarui item di cart
    Route::delete('cart-items/{cartItem}', [CartItemController::class, 'destroy'])->name('cart-items.destroy'); // Menghapus item dari cart

    // Product Routes
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
    Route::post('/products/update', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

    // Purchase Routes
    Route::get('/purchase', [PurchaseController::class, 'index'])->name('purchase.index');
    Route::get('/purchase/create', [PurchaseController::class, 'create'])->name('purchase.create');
    Route::post('/purchase', [PurchaseController::class, 'store'])->name('purchase.store');
    Route::get('/purchase/edit/{id}', [PurchaseController::class, 'edit'])->name('purchase.edit');
    Route::post('/purchase/update', [PurchaseController::class, 'update'])->name('purchase.update');
    Route::delete('/purchase/{id}', [PurchaseController::class, 'destroy'])->name('purchase.destroy');
    Route::post('/purchase/verify', [PurchaseController::class, 'verify'])->name('purchase.verify');
    Route::post('/purchase/unverify', [PurchaseController::class, 'unverify'])->name('purchase.unverify');
    Route::post('/purchase/cancel', [PurchaseController::class, 'cancel'])->name('purchase.cancel');
    Route::post('/purchase/uncancel', [PurchaseController::class, 'uncancel'])->name('purchase.uncancel');

    // Payment Receipt Routes
    Route::get('/purchase/receipt/{id}', [PurchaseController::class, 'showReceipt'])->name('purchase.receipt.admin');

});

Route::middleware('auth')->group(function () {
    Route::get('/user/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');

    Route::get('/user/purchase', [PurchaseController::class, 'userPurchase'])->name('user.purchase');
    Route::get('/user/purchase/upload/receipt/{id}', [PurchaseController::class, 'userUploadReceipt'])->name('user.purchase.upload.receipt');
    Route::post('/user/purchase', [PurchaseController::class, 'store'])->name('user.purchase.store');
    Route::post('/user/purchase/upload/receipt', [PurchaseController::class, 'uploadReceipt'])->name('user.purchase.upload.receipt.store');
    Route::get('/user/purchase/receipt/{id}', [PurchaseController::class, 'showReceipt'])->name('purchase.receipt.user');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// useless routes
// Just to demo sidebar dropdown links active states.
Route::get('/buttons/text', function () {
    return view('buttons-showcase.text');
})->middleware(['auth'])->name('buttons.text');

Route::get('/buttons/icon', function () {
    return view('buttons-showcase.icon');
})->middleware(['auth'])->name('buttons.icon');

Route::get('/buttons/text-icon', function () {
    return view('buttons-showcase.text-icon');
})->middleware(['auth'])->name('buttons.text-icon');

require __DIR__ . '/auth.php';

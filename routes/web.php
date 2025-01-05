<?php

use App\Http\Controllers\AvatarController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\TopupController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WishlistController;
use App\Http\Middleware\SetLocale;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::middleware([SetLocale::class])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/set-locale/{locale}', function ($locale) {
        if (in_array($locale, ['en', 'id', 'cmn'])) {
            Session::put('locale', $locale);
        }
        return redirect()->back();
    })->name('setLocale');
    Route::get('/', [HomeController::class, 'index'])->name('home.index');

    Route::prefix('user')->group(function () {
        Route::get('register', [UserController::class, 'register'])->name('user.register');
        Route::post('register', [UserController::class, 'store'])->name('user.store');
        Route::get('login', [UserController::class, 'login'])->name('user.login');
        Route::post('login', [UserController::class, 'authenticate'])->name('user.authenticate');
        Route::get('profile', [UserController::class, 'profile'])->name('user.profile');
        Route::post('visibility', [UserController::class, 'toggleVisibility'])->name('user.visibility');
    });

    Route::prefix('payment')->group(function () {
        Route::get('checkout', [PaymentController::class, 'checkout'])->name('payment.checkout');
        Route::post('process', [PaymentController::class, 'process'])->name('payment.process');
        Route::get('overpaid', [PaymentController::class, 'overpaid'])->name('payment.overpaid');
        Route::post('add-to-wallet', [PaymentController::class, 'addToWallet'])->name('payment.addToWallet');
    });

    Route::prefix('wishlist')->group(function () {
        Route::get('/', [WishlistController::class, 'index'])->name('wishlist.index');
        Route::post('add', [WishlistController::class, 'add'])->name('wishlist.add');
        Route::post('remove', [WishlistController::class, 'remove'])->name('wishlist.remove');
    });

    Route::prefix('chat')->group(function () {
        Route::get('/{recipientId}', [ChatController::class, 'index'])->name('chat.index');
        Route::post('send', [ChatController::class, 'send'])->name('chat.send');
    });

    Route::prefix('avatar')->group(function () {
        Route::get('/', [AvatarController::class, 'index'])->name('avatar.index');
        Route::post('buy', [AvatarController::class, 'buy'])->name('avatar.buy');
        Route::post('send', [AvatarController::class, 'send'])->name('avatar.send');
        Route::get('collectors-angels', [AvatarController::class, 'collectorsAngels'])->name('avatar.collectors-angels');
    });

    Route::prefix('settings')->group(function () {
        Route::get('/', [SettingsController::class, 'index'])->name('settings.index');
        Route::post('update', [SettingsController::class, 'update'])->name('settings.update');
    });

    Route::prefix('topup')->group(function () {
        Route::get('/', [TopupController::class, 'index'])->name('topup.index');
        Route::post('/add', [TopupController::class, 'topup'])->name('topup.add');
    });

    Route::post('/logout', function () {
        Auth::logout();
        return redirect('/')->with('message', 'You have been logged out successfully!');
    })->name('logout');

    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});

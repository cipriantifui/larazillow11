<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\RealtorListingController;
use App\Http\Controllers\RealtorListingImageController;
use App\Http\Controllers\UserAccountController;
use Illuminate\Support\Facades\Route;


Route::get('/', [IndexController::class, 'index']);

// Auth routes
Route::get('login', [AuthController::class, 'create'])->name('login');
Route::post('login', [AuthController::class, 'store'])->name('login.store');
Route::delete('login', [AuthController::class, 'destroy'])->name('logout');
Route::resource('user-account', UserAccountController::class)
    ->only(['create', 'store']);
// End of Auth routes

Route::resource('listing', ListingController::class)
    ->only(['index', 'show'])->withTrashed();;

Route::prefix('realtor')->name('realtor.')->middleware('auth')->group(function () {
    Route::resource('listing', RealtorListingController::class)
        ->only(['index', 'create', 'store', 'edit', 'update', 'destroy'])
        ->withTrashed();
    Route::put('listing/{listing}/restore', [RealtorListingController::class, 'restore'])
        ->name('listing.restore')->withTrashed();
    Route::resource('listing.image', RealtorListingImageController::class)
        ->only(['create', 'store', 'destroy']);
});

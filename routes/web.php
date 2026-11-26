<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BorrowerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InventoryController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Landing page with the map of Jasin
Route::get('/', function () {
    return view('welcome');
});

// The sidebar's Logout link is a plain GET link; the POST route comes from Auth::routes().
Route::get('/logout', [LoginController::class, 'logout']);

Auth::routes(['verify' => false, 'confirm' => false]);

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    // Borrower
    Route::resource('borrower', BorrowerController::class)->except('show');
    Route::get('borrower-delete/{id}', [BorrowerController::class, 'destroy'])->name('borrower.delete');

    // Inventory
    Route::resource('inventory', InventoryController::class)->except('show');
    Route::get('inventory-delete/{id}', [InventoryController::class, 'destroy'])->name('inventory.delete');
});

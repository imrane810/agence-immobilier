<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminPropertyController;
use App\Http\Controllers\Customer\PropertyController;

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function() {
    Route::resource('properties', AdminPropertyController::class);
});

Route::get('/', function () {
    return view('customer.home');
})->name('customer');

Route::get('/properties', [PropertyController::class, 'index'])
    ->name('properties.index');

Route::get('/properties/{property}', [PropertyController::class, 'show'])
    ->name('properties.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
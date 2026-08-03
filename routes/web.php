<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminPropertyController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Customer\PropertyController;
use App\Http\Controllers\Admin\AdminContactController;
use App\Http\Controllers\Customer\ContactController;
use App\Http\Controllers\Admin\Auth\AdminLoginController;




// Admin Routes
Route::middleware(['auth:admin', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::resource('properties', AdminPropertyController::class);

        Route::get('/users', [AdminUserController::class, 'index'])
            ->name('users.index');

        Route::resource('contacts', AdminContactController::class)
            ->only(['index', 'show', 'update', 'destroy']);
    });

Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/login', [AdminLoginController::class, 'create'])
        ->name('login');

    Route::post('/login', [AdminLoginController::class, 'store'])
        ->name('login.store');

    Route::post('/logout', [AdminLoginController::class, 'destroy'])
        ->name('logout');

});

// User Routes
Route::get('/', function () {
    return view('customer.home');
})->name('customer');
// ----Properties----
Route::get('/properties', [PropertyController::class, 'index'])
    ->name('properties.index');

Route::get('/properties/{property}', [PropertyController::class, 'show'])
    ->name('properties.show');
// ----Contact----
Route::get('/contact', [ContactController::class, 'create'])
    ->name('contact');

Route::post('/contact', [ContactController::class, 'store'])
    ->name('contact.store');

// Authentification Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
<?php

use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;

Route::get('/', function () {
    return view('welcome');
});

//Route::get('admin/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('admin.dashboard');

Route::prefix('admin/dashboard')->middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('dashboard');})->name('admin.dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware('guest')->group(function () {
    Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');

});

require __DIR__ . '/role.php';
require __DIR__ . '/auth.php';

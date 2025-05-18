<?php

use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;

Route::get('/', function () {
    return view('welcome');
});

//Route::get('admin/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('admin.dashboard');

Route::prefix('admin')->middleware('auth')->group(function () {

    Route::prefix('/dashboard')->group(function () {
        Route::get('/', function () {return view('dashboard');})->name('admin.dashboard');
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    Route::prefix('/category')->middleware(['auth', 'verified', 'role:admin', 'permission:create-category'])->group(function () {
            Route::get('/',[CategoryController::class, 'index'])->name('category.index');
            Route::get('/create',[CategoryController::class, 'create'])->name('category.create');
            Route::post('/create',[CategoryController::class, 'store'])->name('category.store');
            Route::get('/{id}/edit',[CategoryController::class, 'edit'])->name('category.edit');
            Route::patch('/{id}/edit',[CategoryController::class, 'update'])->name('category.update');
            Route::delete('/{id}/delete',[CategoryController::class, 'destroy'])->name('category.destroy');

        });
});



Route::middleware('guest')->group(function () {
    Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');

});

require __DIR__ . '/role.php';
require __DIR__ . '/auth.php';

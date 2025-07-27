<?php

use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
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
        Route::get('/profile', function () {return view('profile');})->name('admin.profile');
        Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile/edit', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile/edit', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    Route::prefix('/category')->middleware(['auth', 'verified', 'role:admin', 'permission:create-category'])->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('category.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
        Route::post('/create', [CategoryController::class, 'store'])->name('category.store');
        Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
        Route::patch('/{id}/edit', [CategoryController::class, 'update'])->name('category.update');
        Route::delete('/{id}/delete', [CategoryController::class, 'destroy'])->name('category.destroy');

    });

    Route::prefix('/product')->middleware(['auth', 'verified'])->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('product.index');
        Route::get('/show/{product}', [ProductController::class, 'show'])->name('product.show');
        Route::get('/create', [ProductController::class, 'create'])->name('product.create');
        Route::post('/store', [ProductController::class, 'store'])->name('product.store');
        Route::get('/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
        Route::put('/{id}/edit', [ProductController::class, 'update'])->name('product.update');
        Route::delete('/{id}/delete', [ProductController::class, 'destroy'])->name('product.destroy');

    });
});


Route::middleware('guest')->group(function () {
    Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');

});

require __DIR__ . '/role.php';
require __DIR__ . '/auth.php';

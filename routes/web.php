<?php

use App\Http\Controllers\database\BookController as DatabaseBookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/add-product', function () {
    return view('add-product');
})->name('addProduct');

Route::get('/edit-product', function () {
    return view('edit-product');
})->name('editProduct');

    
Route::middleware('auth')->group(function () {
    Route::post('/buy/{id}', [HomeController::class, 'buy']);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/edit-product/{id}', [DatabaseBookController::class, 'edit'])->name('edit-product');
    Route::put('/edit-product/{id}', [DatabaseBookController::class, 'update'])->name('update-product');
    Route::get('/dashboard', [DatabaseBookController::class, 'index'])->name('dashboard');
    Route::get('/add-product', [DatabaseBookController::class, 'create'])->name('addProduct');
    Route::get('/buy-product/{id}', [DatabaseBookController::class, 'buy'])->name('buy-product');
    Route::post('/add-product', [DatabaseBookController::class, 'store'])->name('store-product');
    Route::delete('/delete-product/{id}', [DatabaseBookController::class, 'destroy'])->name('delete-product');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('dashboard');
});

Route::middleware(['auth', 'role:customer'])->group(function () {
    Route::get('/customer', [CustomerController::class, 'index'])->name('dashboard');
});

require __DIR__.'/auth.php';

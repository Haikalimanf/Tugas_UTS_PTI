<?php

use App\Http\Controllers\database\BookController as DatabaseBookController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

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
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/edit-product/{id}', [DatabaseBookController::class, 'edit'])->name('edit-product');
    Route::put('/edit-product/{id}', [DatabaseBookController::class, 'update'])->name('update-product');
    Route::get('/dashboard', [DatabaseBookController::class, 'index'])->name('dashboard');
    Route::get('/add-product', [DatabaseBookController::class, 'create'])->name('addProduct');
    Route::get('/buy-product/{id}', [DatabaseBookController::class, 'buy'])->name('buy-product');
    Route::delete('/delete-product/{id}', [DatabaseBookController::class, 'destroy'])->name('delete-product');
});

require __DIR__.'/auth.php';

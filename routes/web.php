<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');

    Route::get('users', [UserController::class, 'index'])->name('users.index');

    // group controller with prefix
    Route::prefix('books')->group(function () {
        Route::get('/', [BookController::class, 'index'])->name('books.index');
        Route::get('create', [BookController::class, 'create'])->name('books.create');
        Route::post('/', [BookController::class, 'store'])->name('books.store');
        Route::get('/edit/{book}', [BookController::class, 'edit'])->name('books.edit');
        Route::put('/update/{book}', [BookController::class, 'update'])->name('books.update');
        Route::delete('/delete/{book}', [BookController::class, 'destroy'])->name('books.destroy');
    });

    Route::prefix('borrowers')->group(function () {
        Route::get('/', [BorrowerController::class, 'index'])->name('borrowers.index');
        Route::get('create', [BorrowerController::class, 'create'])->name('borrowers.create');
        Route::post('/', [BorrowerController::class, 'store'])->name('borrowers.store');
        Route::get('/edit/{borrower}', [BorrowerController::class, 'edit'])->name('borrowers.edit');
        Route::put('/update/{borrower}', [BorrowerController::class, 'update'])->name('borrowers.update');
        Route::delete('/delete/{borrower}', [BorrowerController::class, 'destroy'])->name('borrowers.destroy');
    });

    Route::get('profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
});

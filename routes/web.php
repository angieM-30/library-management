<?php

use App\Http\Controllers\BookController;
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
        Route::get('{book}', [BookController::class, 'show'])->name('books.show');
        Route::get('{book}/edit', [BookController::class, 'edit'])->name('books.edit');
        Route::put('{book}', [BookController::class, 'update'])->name('books.update');
        Route::delete('{book}', [BookController::class, 'destroy'])->name('books.destroy');
    });

    Route::get('profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
});

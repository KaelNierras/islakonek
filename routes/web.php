<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ReportController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/pangan-an', function () {
    return view('pages.pangan-an.index');
})->middleware(['auth', 'verified'])->name('pangan-an');

Route::get('/cawhagan', function () {
    return view('pages.cawhagan.index');
})->middleware(['auth', 'verified'])->name('cawhagan');

Route::get('/gilutungan', function () {
    return view('pages.gilutungan.index');
})->middleware(['auth', 'verified'])->name('gilutungan');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('contacts', ContactController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
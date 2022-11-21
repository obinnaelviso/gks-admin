<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\HymnController;

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::prefix('hymns')->group(function() {
    Route::get('/', [HymnController::class, 'index'])->name('hymns.index');
    Route::get('/new', [HymnController::class, 'create'])->name('hymns.create');
    Route::post('/new', [HymnController::class, 'store'])->name('hymns.store');
    Route::get('/{hymn}', [HymnController::class, 'edit'])->name('hymns.edit');
    Route::put('/{hymn}', [HymnController::class, 'update'])->name('hymns.update');
    Route::delete('/{hymn}', [HymnController::class, 'destroy'])->name('hymns.destroy');
});

Route::prefix('config')->group(function() {
    Route::get('/', [ConfigController::class, 'index'])->name('config.index');
    Route::post('/', [ConfigController::class, 'update']);
});

Route::prefix('users')->group(function () {
    Route::get('/', [UsersController::class, 'index'])->name('users.index');
    Route::post('/data', [UsersController::class, 'index'])->name('users.index.data');
    Route::delete('/{user}', [UsersController::class, 'destroy'])->name('users.destroy');
});

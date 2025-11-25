<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MovementController;
use App\Http\Controllers\DashboardController;

use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rotas para Funcionários e Admin
    Route::resource('movements', MovementController::class)->only(['index', 'create', 'store']);
    // Rotas apenas para Admin - usando middleware 'admin'
    Route::middleware('admin')->group(function () {
        Route::resource('users', UserController::class);
        Route::resource('products', ProductController::class);

        Route::prefix('reports')->group(function () {
            Route::get('/stock', [ReportController::class, 'stock'])->name('reports.stock');
            Route::get('/movements', [ReportController::class, 'movements'])->name('reports.movements');
        });
    });
    // Rota Sobre
    Route::get('/about', function () {
        return view('about');
    })->name('about')->middleware('auth');
});

require __DIR__ . '/auth.php';

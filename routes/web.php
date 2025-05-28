<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PersonnelController;
use App\Http\Controllers\AdminController;

// Giriş ve Kayıt Ekranları
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// Çıkış
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

// Authenticated Routes
Route::middleware('auth')->group(function () {
    // Anasayfa yönlendirmesi
    Route::get('/', fn () => redirect()->route('dashboard'))->name('home');

    // Dashboard yönlendirmesi
    Route::get('/dashboard', function () {
        return Auth::user()->role === 'admin'
            ? redirect()->route('admin.dashboard')
            : redirect()->route('personnel.dashboard');
    })->name('dashboard');

    // Admin Dashboard
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // Personnel işlemleri
    Route::prefix('personnel')->name('personnel.')->group(function () {
        Route::get('/dashboard', [PersonnelController::class, 'dashboard'])->name('dashboard');
        Route::get('/create', [PersonnelController::class, 'create'])->name('create');
        Route::post('/store', [PersonnelController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [PersonnelController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [PersonnelController::class, 'update'])->name('update');
        Route::delete('/destroy/{id}', [PersonnelController::class, 'destroy'])->name('destroy');
        Route::get('/index', [PersonnelController::class, 'index'])->name('index');
    });
    
});

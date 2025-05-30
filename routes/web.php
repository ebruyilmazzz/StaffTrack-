<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PersonnelController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\WorkTimeController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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

    Route::get('/dashboard', function () {
        $user = Auth::user(); 
        if ($user->Admin()) {
            return redirect()->route('admin.dashboard');
        } elseif ($user->Personnel()) {
            return redirect()->route('personnel.dashboard');
        }
        abort(403, 'Yetkisiz erişim.'); 
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
    Route::middleware(['auth'])->group(function () {
       
        Route::resource('leaves', LeaveController::class)->except(['edit', 'update', 'destroy']);
        Route::get('/leaves', [LeaveController::class, 'index'])->name('leaves.index');
        Route::get('/leaves/create', [LeaveController::class, 'create'])->name('leaves.create');
        Route::post('/leaves/store', [LeaveController::class, 'store'])->name('leaves.store');
        Route::get('/leaves/edit/{id}', [LeaveController::class, 'edit'])->name('leaves.edit');
        Route::put('/leaves/update/{id}', [LeaveController::class, 'update'])->name('leaves.update');
        Route::delete('/leaves/destroy/{id}', [LeaveController::class, 'destroy'])->name('leaves.destroy');
        Route::put('/leaves/approve/{id}', [LeaveController::class, 'approve'])->name('leaves.approve');
        Route::put('/leaves/reject/{id}', [LeaveController::class, 'reject'])->name('leaves.reject');
    });
    
    
    Route::middleware('auth')->group(function() {
        Route::resource('leaves', LeaveController::class)->except(['edit', 'update', 'destroy']);
        Route::get('/worktimes', [WorkTimeController::class, 'index'])->name('worktimes.index');
        Route::post('/check-in', [WorkTimeController::class, 'checkIn'])->name('check-in');
        Route::post('/check-out', [WorkTimeController::class, 'checkOut'])->name('check-out');
    });
    
});

<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AdminController;

Route::get('/', [ServiceController::class,'publicIndex']);

// Auth
Route::get('/login', [AuthController::class,'showLogin'])->name('login');
Route::post('/login', [AuthController::class,'login']);
Route::get('/register', [AuthController::class,'showRegister']);
Route::post('/register', [AuthController::class,'register']);
Route::post('/logout', [AuthController::class,'logout'])->middleware('auth');

// Appointments
Route::middleware('auth')->group(function() {
    Route::get('/appointments/create',[AppointmentController::class,'create']);
    Route::post('/appointments',[AppointmentController::class,'store']);
});

// Admin
Route::middleware(['auth','admin'])->group(function() {
    Route::get('/admin',[AdminController::class,'dashboard']);
    Route::get('/admin/services',[ServiceController::class,'index'])->name('admin.services.index');
    Route::get('/admin/services/create',[ServiceController::class,'create'])->name('admin.services.create');
    Route::post('/admin/services',[ServiceController::class,'store'])->name('admin.services.store');
    Route::get('/admin/services/{service}/edit',[ServiceController::class,'edit'])->name('admin.services.edit');
    Route::put('/admin/services/{service}',[ServiceController::class,'update'])->name('admin.services.update');
    Route::delete('/admin/services/{service}',[ServiceController::class,'destroy'])->name('admin.services.destroy');
});

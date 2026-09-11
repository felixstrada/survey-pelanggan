<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SurveyController;
use Illuminate\Support\Facades\Route;

// 1. ZONA REDIRECT (Halaman utama otomatis mengarah ke Login Admin)
Route::get('/', function () {
    return redirect()->route('login');
});

// 2. ZONA PUBLIK (Khusus Pelanggan mengisi Form Survei)
Route::get('/survey', [SurveyController::class, 'index'])->name('survey.index');
Route::post('/survey', [SurveyController::class, 'store'])->name('survey.store');

// 3. ZONA PRIVATE / ADMIN (Hanya bisa diakses setelah Login)
Route::middleware(['auth', 'verified'])->group(function () {
    
    // Dashboard Admin
    Route::get('/dashboard', [SurveyController::class, 'dashboard'])->name('dashboard');
    
    // Export Laporan PDF
    Route::get('/export-pdf', [SurveyController::class, 'exportPdf'])->name('survey.export.pdf');

    // Manajemen Profil Admin (Bawaan Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
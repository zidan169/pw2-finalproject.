<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArmadaController;
use App\Http\Controllers\JenisKendaraanController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PeminjamanController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/admin', [AdminController::class, 'index']);

    // Umkm routes
    Route::get('/peminjaman', function () {
        return view('peminjaman'); // go to peminjaman.blade.php
    });
    Route::get('/peminjaman/show', [PeminjamanController::class, 'show'])->name('peminjaman.show'); // display
    Route::get('/peminjaman/create', [PeminjamanController::class, 'create'])->name('peminjaman.create'); // add
    Route::post('/peminjaman/store', [PeminjamanController::class, 'store'])->name('peminjaman.store');
    Route::get('/peminjaman/{id}/edit', [PeminjamanController::class, 'edit'])->name('peminjaman.edit'); // edit
    Route::delete('/peminjaman/{id}', [PeminjamanController::class, 'destroy'])->name('peminjaman.destroy'); // delete
    Route::get('/peminjaman/{id}', [PeminjamanController::class, 'view'])->name('peminjaman.view'); // view

    // Mobil routes
    Route::get('/armada/create', [ArmadaController::class, 'create'])->name('armada.create'); // add
    Route::get('/armada/show', [ArmadaController::class, 'show'])->name('armada.show'); // display
    Route::post('/armada/store', [ArmadaController::class, 'store'])->name('armada.store');
    Route::get('/armada/{id}/edit', [ArmadaController::class, 'edit'])->name('armada.edit'); // edit
    Route::delete('/armada/{id}', [ArmadaController::class, 'destroy'])->name('armada.destroy'); // delete
    Route::get('/armada/{id}', [ArmadaController::class, 'view'])->name('armada.view'); // view

    // Jenis routes
    Route::get('/jenis/create', [JenisKendaraanController::class, 'create'])->name('jenis.create'); // add
    Route::get('/jenis/show', [JenisKendaraanController::class, 'show'])->name('jenis.show'); // display
    Route::post('/jenis/store', [JenisKendaraanController::class, 'store'])->name('jenis.store');
    Route::get('/jenis/{id}/edit', [JenisKendaraanController::class, 'edit'])->name('jenis.edit'); // edit
    Route::delete('/jenis/{id}', [JenisKendaraanController::class, 'destroy'])->name('jenis.destroy'); // delete
    Route::get('/jenis/{id}', [JenisKendaraanController::class, 'view'])->name('jenis.view'); // view

    // Periksa routes
    Route::get('/pembayaran/show', [PembayaranController::class, 'show'])->name('pembayaran.show'); // display
    Route::get('/pembayaran/create', [PembayaranController::class, 'create'])->name('pembayaran.create'); // add
    Route::post('/pembayaran/store', [PembayaranController::class, 'store'])->name('pembayaran.store');
    Route::get('/pembayaran/{id}/edit', [PembayaranController::class, 'edit'])->name('pembayaran.edit'); // edit
    Route::delete('/pembayaran/{id}', [PembayaranController::class, 'destroy'])->name('pembayaran.destroy'); // delete
    Route::get('/pembayaran/{id}', [PembayaranController::class, 'view'])->name('pembayaran.view'); // view

    // Pembina routes
    // Route::get('/pembina/show', [PembinaController::class, 'show']);
});

// Additional routes
Route::get('/salam', function () {
    return "Selamat Datang Mahasiswa STTNF 2024"; // directly print
});

Route::get('/profil', function () {
    return view('profil'); // go to profil.blade.php
});

require __DIR__ . '/auth.php';

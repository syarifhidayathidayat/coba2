<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PenempatanController;
use App\Http\Controllers\PenyediaController;
use App\Http\Controllers\SpController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PaketPekerjaanController;
use App\Http\Controllers\BastController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Pegawai
    Route::get('pegawai', [PegawaiController::class, 'index'])->name('pegawai.index');
    Route::get('pegawai/{pegawai}', [PegawaiController::class, 'show'])->name('pegawai.show');
    Route::middleware(['role:admin|PPK|Pejabat-Pengadaan53|Pejabat-Pengadaan52'])->group(function () {
        Route::get('pegawai/create', [PegawaiController::class, 'create'])->name('pegawai.create');
        Route::post('pegawai', [PegawaiController::class, 'store'])->name('pegawai.store');
        Route::get('pegawai/{pegawai}/edit', [PegawaiController::class, 'edit'])->name('pegawai.edit');
        Route::put('pegawai/{pegawai}', [PegawaiController::class, 'update'])->name('pegawai.update');
        Route::delete('pegawai/{pegawai}', [PegawaiController::class, 'destroy'])->name('pegawai.destroy');
    });

    // Penempatan
    Route::get('penempatan', [PenempatanController::class, 'index'])->name('penempatan.index');
    Route::get('penempatan/{penempatan}', [PenempatanController::class, 'show'])->name('penempatan.show');
    Route::middleware(['role:admin|PPK|Pejabat-Pengadaan53|Pejabat-Pengadaan52'])->group(function () {
        Route::get('penempatan/create', [PenempatanController::class, 'create'])->name('penempatan.create');
        Route::post('penempatan', [PenempatanController::class, 'store'])->name('penempatan.store');
        Route::get('penempatan/{penempatan}/edit', [PenempatanController::class, 'edit'])->name('penempatan.edit');
        Route::put('penempatan/{penempatan}', [PenempatanController::class, 'update'])->name('penempatan.update');
        Route::delete('penempatan/{penempatan}', [PenempatanController::class, 'destroy'])->name('penempatan.destroy');
    });

    // Penyedia
    Route::get('penyedia', [PenyediaController::class, 'index'])->name('penyedia.index');
    Route::get('penyedia/{penyedia}', [PenyediaController::class, 'show'])->name('penyedia.show');
    Route::middleware(['role:admin|PPK|Pejabat-Pengadaan53|Pejabat-Pengadaan52'])->group(function () {
        Route::get('penyedia/create', [PenyediaController::class, 'create'])->name('penyedia.create');
        Route::post('penyedia', [PenyediaController::class, 'store'])->name('penyedia.store');
        Route::get('penyedia/{penyedia}/edit', [PenyediaController::class, 'edit'])->name('penyedia.edit');
        Route::put('penyedia/{penyedia}', [PenyediaController::class, 'update'])->name('penyedia.update');
        Route::delete('penyedia/{penyedia}', [PenyediaController::class, 'destroy'])->name('penyedia.destroy');
    });

    // SP
    Route::get('sp', [SpController::class, 'index'])->name('sp.index');
    Route::get('sp/{id}', [SpController::class, 'show'])->name('sp.show');
    // Cetak hanya untuk Direktur, Keuangan, Kasubag, admin
    Route::middleware(['role:admin|Direktur|Keuangan|Kasubag'])->group(function () {
        Route::get('sp/{id}/cetak', [SpController::class, 'cetak'])->name('sp.cetak');
    });
    // Create, Edit, Delete hanya untuk admin, PPK, Pejabat-Pengadaan53, Pejabat-Pengadaan52
    Route::middleware(['role:admin|PPK|Pejabat-Pengadaan53|Pejabat-Pengadaan52'])->group(function () {
        Route::get('sp/create', [SpController::class, 'create'])->name('sp.create');
        Route::post('sp', [SpController::class, 'store'])->name('sp.store');
        Route::get('sp/{sp}/edit', [SpController::class, 'edit'])->name('sp.edit');
        Route::put('sp/{sp}', [SpController::class, 'update'])->name('sp.update');
        Route::delete('sp/{sp}', [SpController::class, 'destroy'])->name('sp.destroy');
    });

    // Barang
    Route::get('barang/semua', [BarangController::class, 'indexSemuaBarang'])->name('barang.semua');
    Route::get('barang/{barang}', [BarangController::class, 'show'])->name('barang.show');
    Route::middleware(['role:admin|PPK|Pejabat-Pengadaan53|Pejabat-Pengadaan52'])->group(function () {
        Route::get('barang/create', [BarangController::class, 'create'])->name('barang.create');
        Route::post('barang', [BarangController::class, 'store'])->name('barang.store');
        Route::get('barang/{barang}/edit', [BarangController::class, 'edit'])->name('barang.edit');
        Route::put('barang/{barang}', [BarangController::class, 'update'])->name('barang.update');
        Route::delete('barang/{barang}', [BarangController::class, 'destroy'])->name('barang.destroy');
    });

    // Paket Pekerjaan
    Route::get('paket-pekerjaan', [PaketPekerjaanController::class, 'index'])->name('paket-pekerjaan.index');
    Route::get('paket-pekerjaan/{paketPekerjaan}', [PaketPekerjaanController::class, 'show'])->name('paket-pekerjaan.show');
    Route::middleware(['role:admin|PPK|Pejabat-Pengadaan53|Pejabat-Pengadaan52'])->group(function () {
        Route::get('paket-pekerjaan/create', [PaketPekerjaanController::class, 'create'])->name('paket-pekerjaan.create');
        Route::post('paket-pekerjaan', [PaketPekerjaanController::class, 'store'])->name('paket-pekerjaan.store');
        Route::get('paket-pekerjaan/{paketPekerjaan}/edit', [PaketPekerjaanController::class, 'edit'])->name('paket-pekerjaan.edit');
        Route::put('paket-pekerjaan/{paketPekerjaan}', [PaketPekerjaanController::class, 'update'])->name('paket-pekerjaan.update');
        Route::delete('paket-pekerjaan/{paketPekerjaan}', [PaketPekerjaanController::class, 'destroy'])->name('paket-pekerjaan.destroy');
    });

    // BAST
    Route::get('bast', [BastController::class, 'index'])->name('bast.index');
    Route::get('bast/{bast}', [BastController::class, 'show'])->name('bast.show');
    Route::get('bast/{bast}/print/bast', [BastController::class, 'printBast'])->name('bast.print.bast');
    Route::get('bast/{bast}/print/bapem', [BastController::class, 'printBapem'])->name('bast.print.bapem');
    Route::get('bast/{bast}/print/bap', [BastController::class, 'printBap'])->name('bast.print.bap');
    Route::get('bast/{bast}/print/kwitansi', [BastController::class, 'printKwitansi'])->name('bast.print.kwitansi');
    Route::middleware(['role:admin|PPK|Pejabat-Pengadaan53|Pejabat-Pengadaan52'])->group(function () {
        Route::get('bast/create/{sp}', [BastController::class, 'create'])->name('bast.create');
        Route::post('bast', [BastController::class, 'store'])->name('bast.store');
    });

    // Menu & User Management (admin only)
    Route::middleware(['role:admin'])->group(function () {
        Route::resource('menu', MenuController::class);
        Route::resource('user', UserController::class);
    });
});

require __DIR__.'/auth.php';

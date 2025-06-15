<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PenempatanController  ;
use App\Http\Controllers\PenyediaController;
use App\Http\Controllers\SpController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PaketPekerjaanController;
use App\Http\Controllers\BastController;
use App\Http\Controllers\DashboardController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('pegawai', PegawaiController::class);
    Route::resource('penempatan', PenempatanController::class);
    Route::resource('penyedia', PenyediaController::class)->parameters([
        'penyedia' => 'penyedia'
    ]);
    Route::resource('sp', SpController::class);
    Route::get('/sp/{id}', [SpController::class, 'show'])->name('sp.show');
    Route::get('/barang/semua', [BarangController::class, 'indexSemuaBarang'])->name('barang.semua');
    Route::get('/barang/create', [BarangController::class, 'create'])->name('barang.create');

    Route::get('sp/{id}/barang/create', [App\Http\Controllers\BarangController::class, 'create'])->name('barang.create');
    Route::post('sp/{id}/barang', [App\Http\Controllers\BarangController::class, 'store'])->name('barang.store');
    
    // Routes untuk BAST
    // Route::get('sp/{sp_id}/bast/create', [App\Http\Controllers\BastController::class, 'create'])->name('bast.create');
    // Route::post('sp/{sp_id}/bast', [App\Http\Controllers\BastController::class, 'store'])->name('bast.store');
    // Route::get('bast/{id}', [App\Http\Controllers\BastController::class, 'show'])->name('bast.show');
    // Route::get('bast/{id}/print/bast', [App\Http\Controllers\BastController::class, 'printBast'])->name('bast.print.bast');
    // Route::get('bast/{id}/print/bap', [App\Http\Controllers\BastController::class, 'printBap'])->name('bast.print.bap');
    // Route::get('bast/{id}/print/bapem', [App\Http\Controllers\BastController::class, 'printBapem'])->name('bast.print.bapem');
    // Route::get('bast/{id}/print/kwitansi', [App\Http\Controllers\BastController::class, 'printKwitansi'])->name('bast.print.kwitansi');
    
    Route::resource('paket-pekerjaan', PaketPekerjaanController::class);

    // BAST Routes
    Route::get('/bast', [BastController::class, 'index'])->name('bast.index');
    Route::get('/bast/create/{sp}', [BastController::class, 'create'])->name('bast.create');
    Route::post('/bast', [BastController::class, 'store'])->name('bast.store');
    Route::get('/bast/{bast}', [BastController::class, 'show'])->name('bast.show');
    Route::get('/bast/{bast}/print/bast', [BastController::class, 'printBast'])->name('bast.print.bast');
    Route::get('/bast/{bast}/print/bapem', [BastController::class, 'printBapem'])->name('bast.print.bapem');
    Route::get('/bast/{bast}/print/bap', [BastController::class, 'printBap'])->name('bast.print.bap');
    Route::get('/bast/{bast}/print/kwitansi', [BastController::class, 'printKwitansi'])->name('bast.print.kwitansi');
    Route::get('/sp/{id}/cetak', [SpController::class, 'cetak'])->name('sp.cetak');
});






require __DIR__.'/auth.php';

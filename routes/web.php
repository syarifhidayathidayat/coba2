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
use App\Http\Controllers\SearchController;
use App\Http\Controllers\DokumenPemilihanController;

Route::get('/', function () {
    return view('auth.login');
});
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');
Route::post('/dashboard/set-tahun', function () {
    session(['tahun' => request()->input('tahun')]);
    return redirect()->route('dashboard');
})->name('dashboard.setTahun');

// Role Penyedia
Route::middleware(['auth', 'role:Penyedia'])->group(function () {
    Route::get('/penyedia/profile', [\App\Http\Controllers\PenyediaController::class, 'editProfile'])->name('penyedia.profile');
    Route::post('/penyedia/profile', [\App\Http\Controllers\PenyediaController::class, 'updateProfile'])->name('penyedia.profile.update');
    Route::get('/penyedia/bast', [PenyediaBastController::class, 'index'])->name('penyedia.bast.index');
    Route::get('/penyedia/bast', [PenyediaController::class, 'bastSaya'])->name('penyedia.bast.index');
});


// Role mulai from here bro
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');


Route::middleware('auth')->group(function () {
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('pegawai', PegawaiController::class);
    Route::middleware(['role:Admin|Pejabat-Pengadaan53'])->group(function () {
        Route::resource('penempatan', PenempatanController::class);
    });
    Route::resource('penyedia', PenyediaController::class)->parameters([
        'penyedia' => 'penyedia'
    ]);
    Route::post('/set-tahun', [DashboardController::class, 'setTahun'])->name('dashboard.setTahun');

    // Route::resource('penyedia', PenyediaController::class);
    Route::get('/penyedia/{penyedia}', [PenyediaController::class, 'show'])->name('penyedia.show');

    // SP berdasarkan akun
    Route::get('/sp/akun52', [SpController::class, 'index52'])->name('sp.index.52');
    Route::get('/sp/akun53', [SpController::class, 'index53'])->name('sp.index.53');

    // SP Utama
    Route::resource('sp', SpController::class);
    Route::get('/barang/semua', [BarangController::class, 'indexSemuaBarang'])->name('barang.semua');
    Route::get('/barang/create', [BarangController::class, 'create'])->name('barang.create');
    Route::get('sp/{id}/barang/create', [App\Http\Controllers\BarangController::class, 'create'])->name('barang.create');
    Route::post('sp/{id}/barang', [App\Http\Controllers\BarangController::class, 'store'])->name('barang.store');
    Route::get('/sp/{id}', [SpController::class, 'show'])->name('sp.show');
    Route::get('/sp/{id}/cetak', [SpController::class, 'cetak'])->name('sp.cetak');
    Route::resource('paket-pekerjaan', PaketPekerjaanController::class);

    // BAST
    Route::get('/bast', [BastController::class, 'index'])->name('bast.index');
    Route::get('/bast/create/{sp}', [BastController::class, 'create'])->name('bast.create');
    Route::post('/bast', [BastController::class, 'store'])->name('bast.store');
    Route::get('/bast/{bast}', [BastController::class, 'show'])->name('bast.show');
    Route::get('/bast/{bast}/print/bast', [BastController::class, 'printBast'])->name('bast.print.bast');
    Route::get('/bast/{bast}/print/bapem', [BastController::class, 'printBapem'])->name('bast.print.bapem');
    Route::get('/bast/{bast}/print/bap', [BastController::class, 'printBap'])->name('bast.print.bap');
    Route::get('/bast/{bast}/print/kwitansi', [BastController::class, 'printKwitansi'])->name('bast.print.kwitansi');
    Route::get('/bast/{bast}/print/ssp', [BastController::class, 'printSsp'])->name('bast.print.ssp');
    Route::resource('institusi', App\Http\Controllers\InstitusiController::class);
    Route::get('sp/{sp_id}/barang/{nama_barang}/edit', [App\Http\Controllers\BarangController::class, 'edit'])->name('barang.edit');
    Route::put('sp/{sp_id}/barang/{nama_barang}', [App\Http\Controllers\BarangController::class, 'update'])->name('barang.update');
    Route::middleware(['auth', 'role:Admin'])->group(function () {
        Route::resource('menu', MenuController::class);
        Route::resource('user', UserController::class);
    });
    Route::get('/search', [SearchController::class, 'index'])->name('search');
    Route::resource('dokumen-pemilihan', DokumenPemilihanController::class);
    Route::get('/dokumen-pemilihan/{id}/cetak-undangan', [DokumenPemilihanController::class, 'cetakUndangan'])->name('dokumen-pemilihan.cetak.undangan');
});
require __DIR__ . '/auth.php';

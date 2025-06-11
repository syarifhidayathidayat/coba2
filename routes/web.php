<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PenempatanController  ;
use App\Http\Controllers\PenyediaController;
use App\Http\Controllers\SpController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware(['auth'])->name('dashboard.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
});
Route::resource('pegawai', PegawaiController::class);
Route::resource('penempatan', PenempatanController::class);


Route::resource('penyedia', PenyediaController::class)->parameters([
    'penyedia' => 'penyedia'
]);
Route::resource('sp', SpController::class);

Route::get('sp/{id}/barang/create', [App\Http\Controllers\BarangController::class, 'create'])->name('barang.create');
Route::post('sp/{id}/barang', [App\Http\Controllers\BarangController::class, 'store'])->name('barang.store');

require __DIR__.'/auth.php';

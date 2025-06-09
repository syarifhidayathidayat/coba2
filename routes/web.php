<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PenempatanController  ;
use App\Http\Controllers\PenyediaController;


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


require __DIR__.'/auth.php';

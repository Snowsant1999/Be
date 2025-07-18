<?php

use App\Http\Controllers\Admin\BukuController as AdminBukuController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\PeminjamanController as UserPeminjamanController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


//pengalihan route ke login
Route::get('/', function () {
    return view('auth.login');
});

Route::get('/home', [HomeController::class,'index'])->name('home');

Auth::routes();

//middleware untuk admin
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('buku', AdminBukuController::class); //crud buku
    Route::get ('rotes', [AdminBukuController::class,'indexx'])->name('buku.index.show');
});

//middleware untuk user
Route::middleware(['auth'])->prefix('user')->name('user.')->group(function () {
    Route::resource('peminjaman', UserPeminjamanController::class)->except(['edit', 'destroy']); //crud peminjaman
    Route::get ('rotes', [UserPeminjamanController::class,'indexx'])->name('peminjaman.index.show');
});

Auth::routes();


//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

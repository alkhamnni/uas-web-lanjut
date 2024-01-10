<?php
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HandphoneController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HandphoneController::class, 'index']);

Route::get('/handphone/{id}', [HandphoneController::class, 'detail']);

Route::get('/handphones/data', [HandphoneController::class, 'data'])->middleware('auth');

Route::get('/handphones/create', [HandphoneController::class, 'create'])->middleware('auth');

Route::post('/handphones/store', [HandphoneController::class, 'store'])->middleware('auth');

Route::get('/handphone/{id}', [HandphoneController::class, 'edit'])->middleware('auth');

Route::post('/handphone/{id}', [HandphoneController::class, 'update'])->middleware('auth');

Route::get('/handphone/delete/{id}', [HandphoneController::class, 'delete'])->middleware('auth');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login')->middleware('guest');

Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);

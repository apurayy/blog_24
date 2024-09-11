<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;



Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('/login',[AuthController::class, 'login'])->name('login');
Route::post('/login/save',[AuthController::class, 'login_save'])->name('login.save');

Route::get('/register',[AuthController::class, 'register'])->name('register');
Route::post('/register/user',[AuthController::class, 'register_user'])->name('register_user');

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

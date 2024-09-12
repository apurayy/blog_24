<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('/login',[AuthController::class, 'login'])->name('login');
Route::post('/login/save',[AuthController::class, 'login_save'])->name('login.save');

Route::get('/register',[AuthController::class, 'register'])->name('register');
Route::post('/register/user',[AuthController::class, 'register_user'])->name('register_user');
Route::get('/logout',[AuthController::class, 'logout'])->name('logout');



Route::group(['middleware' => 'adminuser'], function() {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/user/list', [UserController::class, 'user_list'])->name('user.list');
    Route::get('/user/add', [UserController::class, 'user_add'])->name('user.add');
    Route::post('/user/insert', [UserController::class, 'user_insert'])->name('user.insert');
    Route::get('/user/edit/{id}', [UserController::class, 'user_edit']);
    Route::post('/user/update/{id}', [UserController::class, 'user_update'])->name('user_update');
    Route::get('/user/delete/{id}', [UserController::class, 'user_delete'])->name('user_delete');
});

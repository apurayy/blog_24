<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;



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

    Route::get('/category/list', [CategoryController::class, 'category_list'])->name('category.list');
    Route::get('/category/add', [CategoryController::class, 'category_add'])->name('category.add');
    Route::post('/category/insert', [CategoryController::class, 'category_insert'])->name('category.insert');
    // Route::get('/category/edit/{id}', [CategoryController::class, 'category_edit']);
    // Route::post('/category/update/{id}', [CategoryController::class, 'category_update'])->name('category_update');
    // Route::get('/category/delete/{id}', [CategoryController::class, 'category_delete'])->name('category_delete');
});

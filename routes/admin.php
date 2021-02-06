<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\LevelController;
use App\Http\Controllers\Admin\CategoryController;


Route::get('', [HomeController::class, 'index'])->middleware('can:Ver dashboard')->name('home');
Route::resource('roles', RoleController::class)->names('roles');
Route::resource('users', UserController::class)->names('users')->only(['index', 'edit', 'update']);
Route::resource('categories', CategoryController::class)->names('categories');
Route::resource('levels', LevelController::class)->names('levels');


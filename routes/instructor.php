<?php

use Illuminate\Support\Facades\Route;


Route::get('courses', [HomeController::class, 'index']);

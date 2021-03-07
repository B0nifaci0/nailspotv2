<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Judge\CompetenceController;

Route::redirect('', 'competences');

Route::resource('competences', CompetenceController::class)->names('competences');

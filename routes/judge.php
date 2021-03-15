<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Judge\CompetenceController;

Route::redirect('', 'competences');

Route::get('competences', [CompetenceController::class, 'index'])->name('competences.index');

Route::get('{competence}/participants', [CompetenceController::class, 'participants'])->name('competences.participants');

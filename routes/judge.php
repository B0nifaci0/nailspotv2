<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Judge\CompetenceController;

Route::redirect('', 'judge/competences');

Route::get('competences', [CompetenceController::class, 'index'])->name('competences.index');

Route::get('{subcompetence}/{criterion}/participants', [CompetenceController::class, 'participants'])->name('competences.participants');

Route::get('{participant}/{criterion}/show', [CompetenceController::class, 'show'])->name('competences.show');

Route::post('{participant}/{criterion}/score', [CompetenceController::class, 'score'])->name('competences.score');

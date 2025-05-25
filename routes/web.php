<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;

Route::get('/', [RecipeController::class, 'index'])->name('recipes.index');
Route::resource('recipes', RecipeController::class);

<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;

Route::get('/', function () {
    return redirect()->route('recipes.index'); // redirect home to recipes
});

Route::resource('recipes', RecipeController::class);


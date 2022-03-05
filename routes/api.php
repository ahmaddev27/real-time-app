<?php
use Illuminate\Support\Facades\Route;



Route::apiResource('question',\App\Http\Controllers\Api\QuestionController::class);
Route::apiResource('category',\App\Http\Controllers\Api\CategoryController::class);

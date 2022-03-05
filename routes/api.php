<?php
use Illuminate\Support\Facades\Route;



Route::apiResource('question',\App\Http\Controllers\Api\QuestionController::class);
Route::apiResource('category',\App\Http\Controllers\Api\CategoryController::class);
Route::apiResource('{question}/reply',\App\Http\Controllers\Api\ReplyController::class);

Route::post('{reply}/like/{user_id}',[\App\Http\Controllers\Api\LikeController::class,'like']);
Route::delete('{reply}/like/{user_id}',[\App\Http\Controllers\Api\LikeController::class,'unlike']);

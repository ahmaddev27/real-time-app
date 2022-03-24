<?php
use Illuminate\Support\Facades\Route;


Route::apiResource('question',\App\Http\Controllers\Api\QuestionController::class);
Route::apiResource('category',\App\Http\Controllers\Api\CategoryController::class);
Route::apiResource('{question}/reply',\App\Http\Controllers\Api\ReplyController::class);
Route::post('{reply}/like',[\App\Http\Controllers\Api\LikeController::class,'like']);
Route::delete('{reply}/unlike',[\App\Http\Controllers\Api\LikeController::class,'unlike']);




Route::group(['middleware' => 'api'], function () {
    Route::post('login',[\App\Http\Controllers\Api\AuthController::class,'login'])->name('login');
    Route::post('signup',[\App\Http\Controllers\Api\AuthController::class,'register']);
    Route::post('logout',  [\App\Http\Controllers\Api\AuthController::class,'logout']);
    Route::post('refresh',  [\App\Http\Controllers\Api\AuthController::class,'refresh']);
    Route::post('profile', [\App\Http\Controllers\Api\AuthController::class,'userProfile']);

});

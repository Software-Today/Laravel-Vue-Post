<?php

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/add-user',[UserController::class,'addUser'])->name('add-user');
Route::post('/save-user',[UserController::class,'saveUser'])->name('save-user');
Route::get('/view-user',[UserController::class,'viewUser'])->name('view-user');

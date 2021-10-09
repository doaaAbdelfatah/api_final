<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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
Route::middleware('auth:sanctum')->get('/user/posts',[UserController::class , "posts"]);


// Route::get("/post" ,[PostController::class , "index"]);
// Route::post("/user/register" , [UserController::class ,"register"]);
Route::post("/user/login" , [UserController::class ,"login"])->name("login");
// Route::get("/user/posts" , [UserController::class ,"user_posts"]);
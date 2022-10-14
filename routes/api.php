<?php

use App\Models\User;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactFormController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/user',[ UserController::class, "getAllUsers"])->middleware('CORS');
Route::get('/user/{user}',[ UserController::class, "getUser"])->middleware('CORS');
Route::post('/contact',[ ContactFormController::class, "storeFromFront"]);
<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
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
Route::post('/register', [AuthController::class,'register']);
Route::post('/login', [AuthController::class,'login']);
Route::get('/logout', [AuthController::class,'logout'])->middleware('auth:api');

Route::get('auth/social',[ AuthController::class,'show'])->name('social.login');
Route::get('oauth/{driver}', [AuthController::class,'redirectToProvider'])->name('social.oauth');
Route::get('oauth/{driver}/callback', [AuthController::class,'handleProviderCallback'])->name('social.callback');

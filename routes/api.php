<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\PassportAuthController;
use App\Http\Controllers\API\ProductController;

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

Route::post('/register', [App\Http\Controllers\API\AuthController::class, 'register']);
Route::post('/login', [App\Http\Controllers\API\AuthController::class, 'login']);
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function (Request $request) {
        return auth()->user();
    });
    Route::post('/logout', [App\Http\Controllers\API\AuthController::class, 'logout']);
    Route::get('get-user', [App\Http\Controllers\API\AuthController::class, 'userInfo']);
    Route::resource('products', App\Http\Controllers\API\ProductController::class);
});
Route::apiResource('/posts', App\Http\Controllers\Api\PostController::class);
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
// Route::post('register', [PassportAuthController::class, 'register']);
// Route::post('login', [PassportAuthController::class, 'login']);

// Route::middleware('auth:api')->group(function () {
//     Route::get('get-user', [PassportAuthController::class, 'userInfo']);
//     Route::resource('products', [ProductController::class]);
// });
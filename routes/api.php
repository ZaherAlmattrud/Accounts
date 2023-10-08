<?php

use App\Http\Controllers\Apis\Version_0_1\UserAuthController;
use App\Http\Controllers\Apis\Version_0_1\AccountController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// ========================  Auth Routes =================================//

Route::group(['middleware' => 'cors'], function () {

    Route::post('register', [UserAuthController::class, 'register']);
    Route::post('login', [UserAuthController::class, 'login']);
    
    Route::post('me', [UserAuthController::class, 'me'])
    ->middleware('auth:sanctum');
    Route::post('logout', [UserAuthController::class, 'logout'])
        ->middleware('auth:sanctum');
});

// ========================  account Routes =================================//

Route::group(['middleware' => ['cors','auth:sanctum']], function () {

    Route::resource('account', AccountController::class);
   
});







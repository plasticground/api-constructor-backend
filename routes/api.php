<?php

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
Route::group(['prefix' => 'v1'], function () {

    Route::post('/login', \App\Http\Controllers\Api\v1\Auth\LoginController::class)
        ->name('login');

    Route::post('/logout', \App\Http\Controllers\Api\v1\Auth\LogoutController::class)
        ->name('logout');

    Route::post('/registration', \App\Http\Controllers\Api\v1\Auth\RegistrationController::class)
        ->name('registration');

    Route::get('/test', function (Request $request) {
        return ['result' => 'ok'];
    });

    /**
     * Public routes
     */
    Route::group(['middleware' => 'auth:sanctum'], function () {

        /**
         * Public routes
         */
        Route::get('/user', \App\Http\Controllers\Api\v1\Auth\UserController::class);

        /**
         * Admin routes
         */
        Route::group([
            'as' => 'admin.',
            'prefix' => 'admin',
            'middleware' => 'admin',
            'namespace' => '\App\Http\Controllers\Api\v1\Admin',
        ], function () {
            Route::apiResource('users', 'UserController');
        });

        /**
         * Web routes
         */
        Route::group([
            'as' => 'web.',
            'prefix' => 'web',
            'middleware' => 'web',
            'namespace' => '\App\Http\Controllers\Api\v1\Web'
        ], function () {
            Route::apiResource('users', 'UserController')->only(['index', 'update']);
        });
    });
});

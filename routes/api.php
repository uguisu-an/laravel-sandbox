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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/test/filled', 'TestFilledValidationController');
Route::post('/test/nullable', 'TestNullableValidationController');
Route::post('/test/required', 'TestRequiredValidationController');
Route::post('/test/present', 'TestPresentValidationController');
Route::post('/test/sometimes', 'TestSometimesValidationController');

Route::get('/sync', 'SyncController')->name('sync');

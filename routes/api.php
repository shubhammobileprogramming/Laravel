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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('all-data', 'App\Http\Controllers\POST@get_data');
Route::post('create-data', 'App\Http\Controllers\POST@create_data');
Route::put('update-data', 'App\Http\Controllers\POST@update_data');
Route::delete('delete-data', 'App\Http\Controllers\POST@delete_data');
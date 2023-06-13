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

//Read Data
Route::get('/task/all', 'TaskAPIController@all');
//Tambah Data
Route::post('/task/create', 'TaskAPIController@create');
//Edit Data
Route::post('/task/update', 'TaskAPIController@update');
//Hapus Data
Route::delete('/task/delete/{id}', 'TaskAPIController@delete');

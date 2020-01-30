<?php

use Illuminate\Http\Request;

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
use Illuminate\Support\Facades\Route;

Route::get('/summary', 'SummaryController@list');
Route::get('/summary/{id}', 'SummaryController@find');
Route::get('/summary/related_to_position/{id}', 'SummaryController@related');


Route::get('/position', 'PositionController@list');
Route::get('/position/{id}', 'PositionController@find');
Route::get('/position/related_to_summary/{id}', 'PositionController@related');

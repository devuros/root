<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::prefix('api')->group(function()
{

	Route::get('lessons/{id}/tags', 'TagsController@index');

	Route::apiResource('lessons', 'LessonsController');

	Route::apiResource('tags', 'TagsController')->only(['index', 'show']);

});

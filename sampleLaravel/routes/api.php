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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'cors'], function(){
  Route::get('/my_first_api', 'HomeController@my_first_api');
  Route::get('/players', 'HomeController@showAllPlayers');
  Route::get('/player/{id}', 'HomeController@showPlayerById');
  Route::get('/showConnectwiseCompanies', 'HomeController@showConnectwiseCompanies');
});

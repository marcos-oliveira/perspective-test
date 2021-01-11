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
Route::get('/quiz', 'QuizController@index');
Route::get('/quiz/{email}', 'QuizController@quiz');
Route::post('/quiz', 'QuizController@store');
Route::get('/mbti', 'QuizController@mbti')->name('api.mbti');;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

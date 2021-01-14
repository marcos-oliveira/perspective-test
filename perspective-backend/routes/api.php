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
### User story
Route::get('/questions', 'QuestionController@index');
Route::post('/quiz', 'QuizController@store');

### "Technical user story" (permission validation middleware)
Route::middleware('techuser:api')->group(function () {
    Route::get('/quiz', 'QuizController@index');
    Route::get('/quiz/{email}', 'QuizController@show');
    Route::get('/mbti/{email}', 'QuizController@mbti')->name('api.mbti');
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

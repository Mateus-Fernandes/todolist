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
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

$this->group(['namespace' => 'Task'], function(){
    Route::get('tasks/{id}', 'TaskController@list')->name('tasks.list');
    Route::post('tasks/{id}', 'TaskController@store')->name('tasks.store');
    Route::put('tasks/{task}', 'TaskController@update')->name('tasks.update');
    Route::delete('tasks/{task}', 'TaskController@destroy')->name('tasks.destroy');
}); // API - Http requests


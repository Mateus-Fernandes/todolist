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


Auth::routes();

Route::get('/sobre', function () {
    return view('sobre.index');
})->name('sobre');

Route::get('/{todo}/share', 'Todo\TodoController@edit')->name('todo.editShare'); //public link to Edit To do Items

$this->group(['middleware' => ['auth'], 'namespace' => 'Todo'], function(){
    Route::get('/', 'TodoController@index')->name('todo.index');
    Route::get('/{any}', 'TodoController@add', function($any){});
    Route::post('/store', 'TodoController@store')->name('todo.store');
    Route::get('/{todo}/edit', 'TodoController@edit')->name('todo.edit');
    Route::delete('/{todo}/destroy', 'TodoController@destroy')->name('todo.destroy');
}); // all routes in auth




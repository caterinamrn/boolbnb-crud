<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/list', 'UserController@usindex')-> name('user.index');
Route::get('/edit/{id}', 'UserController@edit')-> name('apart.edit');
Route::post('/update/{id}', 'UserController@update')-> name('apart.update');

Route::get('/create', 'UserController@create') -> name('apart.create');
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/store', 'UserController@store')-> name('apart.store');
Route::get('/delete/{id}', 'UserController@delete')-> name('apart.delete');
Route::get('/apart/{id}', 'UserController@show')-> name('apart.show');

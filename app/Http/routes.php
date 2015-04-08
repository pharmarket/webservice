<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
	Route::resource('user', 'UserController', ['only' => ['store', 'destroy', 'update', 'show', 'index']]);
	Route::resource('devise', 'DeviseController', ['only' => ['store', 'destroy', 'update', 'show', 'index']]);
	Route::resource('media', 'MediaController', ['only' => ['store', 'destroy', 'update', 'show', 'index']]);
	Route::resource('posologie', 'PosologieController', ['only' => ['store', 'destroy', 'update', 'show', 'index']]);
	Route::resource('posologie_sexe', 'Posologie_sexeController', ['only' => ['store', 'destroy', 'update', 'show', 'index']]);
	Route::resource('posologie_type', 'Posologie_typeController', ['only' => ['store', 'destroy', 'update', 'show', 'index']]);
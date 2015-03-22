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

/* routes pour les table */
	Route::resource('user', 'UserController', ['only' => ['store', 'destroy', 'update', 'show', 'index']]);
	Route::resource('contact', 'ContactController', ['only' => ['store', 'destroy', 'update', 'show', 'index']]);


/* routes pour les pages */
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
	Route::resource('categorie_forum', 'Categorie_forumController', ['only' => ['store', 'destroy', 'update', 'show', 'index']]);
	Route::resource('fournisseur', 'FournisseurController', ['only' => ['store', 'destroy', 'update', 'show', 'index']]);
	Route::resource('newletter', 'NewletterController', ['only' => ['store', 'destroy', 'update', 'show', 'index']]);
	Route::resource('faq', 'FaqController', ['only' => ['store', 'destroy', 'update', 'show', 'index']]);
	Route::resource('message_forum', 'Message_forumController', ['only' => ['store', 'destroy', 'update', 'show', 'index']]);
	Route::resource('panier', 'PanierController', ['only' => ['store', 'destroy', 'update', 'show', 'index']]);
	Route::resource('panier_exemplaire', 'Panier_exemplaireController', ['only' => ['store', 'destroy', 'update', 'show', 'index']]);
	Route::resource('pays', 'PaysController', ['only' => ['store', 'destroy', 'update', 'show', 'index']]);
	Route::resource('ville', 'VilleController', ['only' => ['store', 'destroy', 'update', 'show', 'index']]);
	Route::resource('sujet_forum', 'Sujet_forumController', ['only' => ['store', 'destroy', 'update', 'show', 'index']]);
	Route::resource('role', 'RoleController', ['only' => ['store', 'destroy', 'update', 'show', 'index']]);
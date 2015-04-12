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

/**** diminoob routes ***/

//Ressource : User
//Front : Get / Update / Store
//Admin : Get / Destroy / Update / Store
//Forum : Get / Update


	Route::resource('user', 'UserController', ['only' => ['store', 'destroy', 'update', 'show', 'index']]);






	/**** william routes ***/

	//Ressource : Contact
	//Front : Store
	//Admin : Get / Destroy / Update
	//Forum : Nan

	Route::resource('contact', 'ContactController', ['only' => ['store', 'destroy', 'update', 'show', 'index']]);

	//Ressource : Produit ( en dev pas officiel)
	//Front : Get (id // getbycat cat // getbystatus // getbydispo //.... )
	//Admin : Get / Destroy / Update
	//Forum : Get

	Route::resource('produit', 'ProductController', ['only' => ['store', 'destroy', 'update', 'show']]);

	Route::get('getProduitByCat/{cat}', 'ProductController');
	Route::get('getProduitByStatus/{status}', 'ProductController');
	Route::get('getProduitByDispo', 'ProductController');
	Route::get('getProduitByFiltre/{filtres}', 'ProductController');

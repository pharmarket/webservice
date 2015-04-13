<?php namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider {

	/**
	 * This namespace is applied to the controller routes in your routes file.
	 *
	 * In addition, it is set as the URL generator's root namespace.
	 *
	 * @var string
	 */
	protected $namespace = 'App\Http\Controllers';

	/**
	 * Define your route model bindings, pattern filters, etc.
	 *
	 * @param  \Illuminate\Routing\Router  $router
	 * @return void
	 */
	public function boot(Router $router)
	{
		parent::boot($router);

		$router->model('user', 'App\User');
		$router->model('devise', 'App\Devise');
		$router->model('media', 'App\Media');
		$router->model('posologie', 'App\Posologie');
		$router->model('posologie_sexe', 'App\Posologie_sexe');
		$router->model('posologie_type', 'App\Posologie_type');
		$router->model('categorie_forum', 'App\Categorie_forum');
		$router->model('fournisseur', 'App\Fournisseur');
		$router->model('newletter', 'App\Newletter');
		$router->model('faq', 'App\Faq');
		$router->model('message_forum', 'App\Message_forum');
		$router->model('panier', 'App\Panier');
		$router->model('panier_exemplaire', 'App\Panier_exemplaire');
		$router->model('pays', 'App\Pays');
		$router->model('ville', 'App\Ville');
		$router->model('role', 'App\Role');
		$router->model('sujet_forum', 'App\Sujet_forum');

	}

	/**
	 * Define the routes for the application.
	 *
	 * @param  \Illuminate\Routing\Router  $router
	 * @return void
	 */
	public function map(Router $router)
	{
		$router->group(['namespace' => $this->namespace], function($router)
		{
			require app_path('Http/routes.php');
		});
	}

}

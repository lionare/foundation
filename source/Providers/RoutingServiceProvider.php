<?php

namespace Foundation\Providers;

use Agreed\Technical\Configuration;
use Routing\Router;
use Support\ServiceProvider;

class RoutingServiceProvider extends ServiceProvider
{
	public function register ( )
	{
		$this->application->bind ( Router::class, 

		function ( Configuration $configuration )
		{
			$router = new Router;

			$routes = $configuration->get ( 'routes' );
			foreach ( $routes as $name => $route )
				$router->add ( $name, $route );

			return $router;
		} );
	}
}
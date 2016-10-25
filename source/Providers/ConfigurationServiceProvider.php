<?php

namespace Foundation\Providers;

use Agreed\Technical\Configuration;
use Support\ServiceProvider;

class ConfigurationServiceProvider extends ServiceProvider
{
	public function register ( )
	{
		$this->application->share ( Configuration::class, function ( )
		{
			$configuration = new Configuration;
			$configuration->set ( 'file system disks', require configuration_path ( ) . '/file system/disks.php' );
			$configuration->set ( 'file system tree', require configuration_path ( ) . '/file system/tree.php' );

			$configuration->set ( 'routes', require configuration_path ( ) . '/routes.php' );

			$view = require configuration_path ( ) . '/view/global.php';
			$configuration->set ( 'theme path', $view [ 'path' ] );

			return $configuration;
		} );
	}
}
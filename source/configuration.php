<?php

use Agreed\Technical\Configuration;

$app = $application;


$configuration = new Configuration;
$configuration->set ( 'file system disks', require configuration_path ( ) . '/file system/disks.php' );
$configuration->set ( 'file system tree', require configuration_path ( ) . '/file system/tree.php' );

$view = require configuration_path ( ) . '/view/view.php';
$configuration->set ( 'theme path', $view [ 'path' ] );

$application = $app;

$application->share ( Configuration::class, function ( ) use ( $configuration )
{
	return $configuration;
} );
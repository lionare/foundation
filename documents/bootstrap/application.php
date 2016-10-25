<?php

$application = new Foundation\Application;

share ( Agreed\Technical\Application::class, function ( ) use ( $application )
{
	return $application;
} );
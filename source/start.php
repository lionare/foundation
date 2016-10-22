<?php

$application = new Foundation\Application;

require __DIR__ . '/../../support/source/readability.php';

/*
|--------------------------------------------------------------------------
| Binding application services
|--------------------------------------------------------------------------
*/

$application->share ( Agreed\Technical\Application::class, 

function ( ) use ( $application )
{
	return $application;
} );

require __DIR__ . '/configuration.php';

foreach ( require __DIR__ . '/providers.php' as $provider )
	( new $provider ( $application ) )->register ( );




$fileSystem = $application->make ( 'FileSystem\\FileSystem' );
$directory = $application->make ( 'FileSystem\\Facades\\DirectoryFinder' );


/*
|--------------------------------------------------------------------------
| Require application features.
|--------------------------------------------------------------------------
|
| Here we require the application features. This loads all the features we 
| have coded.
*/

foreach ( $fileSystem->findFilesIn ( $directory->at ( '/application' ) ) as $file )
	if ( $file->extension === 'php' )
		require base_path ( ) . $file->path;
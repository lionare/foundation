<?php

namespace Foundation\Providers;

use HTTP\Request;
use Support\ServiceProvider;

class HTTPServiceProvider extends ServiceProvider
{
	public function register ( )
	{
		$this->application->bind ( Request::class, function ( )
		{
			return Request::capture ( );
		} );
	}
}
<?php  namespace Acme\Facades; 

use Illuminate\Support\Facades\Facade;

class ProjectService extends Facade {

	protected static function getFacadeAccessor()
	{
		return 'projectservice';
	}

} 
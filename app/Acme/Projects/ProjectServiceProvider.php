<?php  namespace Acme\Projects; 

use Illuminate\Support\ServiceProvider;

class ProjectServiceProvider extends ServiceProvider {

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind('projectservice', 'Acme\Services\ProjectSessionService');
	}
}
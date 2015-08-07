<?php  namespace Acme\Projects; 

use Illuminate\Support\ServiceProvider;

class CartMaterialsServiceProvider extends ServiceProvider {

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind('cartmaterials', 'Acme\Services\CartMaterialsService');
	}
}
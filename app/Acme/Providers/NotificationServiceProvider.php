<?php  namespace Acme\Providers; 

use Illuminate\Support\ServiceProvider;

class NotificationServiceProvider extends ServiceProvider {

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind('Acme\Notifications\NotificationInterface', 'Acme\Handlers\PushNotification');
	}
}
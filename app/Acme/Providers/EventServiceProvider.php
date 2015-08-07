<?php  namespace Acme\Providers; 

use Illuminate\Support\ServiceProvider;

/**
 * Class EventServiceProvider
 * @package Acme\Providers
 */
class EventServiceProvider extends ServiceProvider{

    /**
     * Register the event listeners.
     *
     * @return void
     */
    public function register()
    {
        $this->app['events']->listen('Acme.Registration.Events.UserHasRegistered', 'Acme\Handlers\EmailNotifier');
	    $this->app['events']->listen('Acme.Projects.Events.ProjectHasCreated', 'Acme\Notifications\NotificationInterface');
	    $this->app['events']->listen('Acme.Projects.Events.ProjectHasCreated', 'Acme\Cart\CartEventHandler');
    }
}
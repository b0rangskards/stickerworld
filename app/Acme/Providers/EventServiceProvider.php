<?php  namespace Acme\Providers; 

use Illuminate\Support\ServiceProvider;

/**
 * Class EventServiceProvider
 * @package Acme\Providers
 */
class EventServiceProvider extends ServiceProvider {

    /**
     * Register the event listeners.
     *
     * @return void
     */
    public function register()
    {
        $this->app['events']->listen( 'Acme.*', 'Acme\Handlers\EmailNotifier');
    }
}
<?php namespace Codeception\Module;


use Illuminate\Support\Facades\Artisan;
use Laracasts\TestDummy\Factory as TestDummy;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

class FunctionalHelper extends \Codeception\Module
{

    /**
     * Create a user account in the database.
     *
     * @param array $overrides
     * @return mixed
     */
    public function haveAnAccount($overrides = [])
    {
        return $this->have('User', $overrides);
    }

    /**
     * Insert a dummy record into a database table.
     *
     * @param $model
     * @param array $overrides
     * @return mixed
     */
    public function have($model, $overrides = [])
    {
        return TestDummy::create($model, $overrides);
    }

    public function seeExceptionThrown($exception, $function)
    {
        try {
            $function();
            return false;
        } catch ( \Exception $e ) {
            if ( get_class($e) == $exception ) {
                return true;
            }
            return false;
        }
    }

    public function createAUser($count = 1)
    {
        return TestDummy::times($count)->create('User',
            [
                'role_id' => 1,
                'activation_code' => str_random(20)
            ]);
    }

}

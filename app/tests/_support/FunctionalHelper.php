<?php namespace Codeception\Module;


use Codeception\Module;
use Illuminate\Support\Facades\Artisan;
use Laracasts\TestDummy\Factory as TestDummy;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

class FunctionalHelper extends Module
{

    private function initializeFactoriesPath()
    {
        TestDummy::$factoriesPath = 'app/tests/factories';
    }

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
     * @param $modelName
     * @param array $overrides
     * @return mixed
     */
    public function have($modelName, $overrides = [])
    {
        $this->initializeFactoriesPath();

        return TestDummy::create($modelName, $overrides);
    }


    public function haveTimes($modelName, $count, $ovverides = [])
    {
        $this->initializeFactoriesPath();

        return TestDummy::times($count)->create($modelName, $ovverides);
    }

    public function build($modelName, $overrides = [])
    {
        $this->initializeFactoriesPath();

        return TestDummy::build($modelName, $overrides);
    }

    public function buildDataFor($modelName, $overrides = [])
    {
        $this->initializeFactoriesPath();

        return TestDummy::attributesFor($modelName, $overrides);
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

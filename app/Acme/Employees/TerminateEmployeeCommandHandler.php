<?php  namespace Acme\Employees; 

use Employee;
use Laracasts\Commander\CommandHandler;

class TerminateEmployeeCommandHandler implements CommandHandler {

    protected $repository;

    function __construct(EmployeeRepository $repository)
    {
        $this->repository = $repository;
    }


    /**
     * Handle the command
     *
     * @param $command
     * @return mixed
     */
    public function handle($command)
    {
        $employee = Employee::terminate(
            $command->id
        );

        return $this->repository->save( $employee);
    }
}
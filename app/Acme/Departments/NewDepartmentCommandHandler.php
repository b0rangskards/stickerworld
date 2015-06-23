<?php  namespace Acme\Departments; 

use Department;
use Laracasts\Commander\CommandHandler;

class NewDepartmentCommandHandler implements CommandHandler {

    protected $repository;

    /**
     * @param DepartmentRepository $repository
     */
    function __construct(DepartmentRepository $repository)
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
        $department = Department::newDepartment( $command->name );

        $this->repository->save($department);

        return $department;
    }
}
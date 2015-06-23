<?php  namespace Acme\Departments; 

use Department;
use Laracasts\Commander\CommandHandler;

class UpdateDepartmentCommandHandler implements CommandHandler {

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
       $department = Department::updateDepartment(
           $command->id,
           $command->name
       );

       return $this->repository->save($department);
    }
}
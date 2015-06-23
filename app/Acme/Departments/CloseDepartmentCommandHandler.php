<?php  namespace Acme\Departments; 

use Department;
use Laracasts\Commander\CommandHandler;

class CloseDepartmentCommandHandler implements CommandHandler {

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
        $department = Department::close(
            $command->id
        );

        return $this->repository->close($department);
    }
}
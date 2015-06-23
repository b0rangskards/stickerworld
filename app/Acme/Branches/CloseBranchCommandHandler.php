<?php  namespace Acme\Branches; 

use Branch;
use Laracasts\Commander\CommandHandler;

class CloseBranchCommandHandler implements CommandHandler {

    protected $repository;

    function __construct(BranchRepository $repository)
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
        $branch = Branch::close(
            $command->id
        );

        return $this->repository->close($branch);
    }
}
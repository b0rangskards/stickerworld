<?php  namespace Acme\Branches; 

use Branch;
use Laracasts\Commander\CommandHandler;

class UpdateBranchInformationCommandHandler implements CommandHandler {

    protected $repository;

    /**
     * @param BranchRepository $repository
     */
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
        $branch = Branch::updateInformation(
            $command->id,
            $command->name,
            $command->address,
            $command->contact_no,
            $command->lat,
            $command->lng
        );

        $this->repository->save($branch);

        return $branch;
    }
}
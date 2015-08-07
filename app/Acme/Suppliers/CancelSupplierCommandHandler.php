<?php  namespace Acme\Suppliers; 

use Laracasts\Commander\CommandHandler;
use Supplier;

class CancelSupplierCommandHandler implements CommandHandler {

    protected $repository;

    function __construct(SupplierRepository $repository)
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
        $supplier = Supplier::cancel(
          $command->id
        );

        $this->repository->save($supplier);

        return $supplier;
    }
}
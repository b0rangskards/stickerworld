<?php  namespace Acme\Suppliers; 

use Input;
use Laracasts\Commander\CommandHandler;
use Log;
use Supplier;

class UpdateSupplierCommandHandler implements CommandHandler {

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
	    Log::info(Input::all());

        $supplier = Supplier::updateInformation(
            $command->supplier_id,
            $command->name,
            $command->supplier_type,
            $command->address,
            $command->email
        );

        $this->repository->save($supplier);

        return $supplier;
    }
}
<?php  namespace Acme\Suppliers; 

use Auth;
use Laracasts\Commander\CommandHandler;
use Supplier;

class NewSupplierCommandHandler implements CommandHandler {

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
        $currentLoggedEmployee = Auth::user()->employee()->first();

        $brId = !is_null($currentLoggedEmployee) && isset($currentLoggedEmployee->br_id)
            ? $currentLoggedEmployee->br_id
            : null;

        $supplier = Supplier::newSupplier(
            $brId,
            $command->name,
            $command->supplier_type,
            $command->address,
            $command->email
        );

        $contacts = array_combine($command->contact_type, $command->contact_no);

        $supplier = $this->repository->save( $supplier);

        foreach($contacts as $type => $number) {
            $supplier->contacts()->create([
                'number'    => $number,
                'type'      => $type
            ]);
        }

        return $supplier;
    }
}
<?php  namespace Acme\Suppliers; 

use Acme\Base\BaseRepositoryInterface;
use Session;
use Supplier;

class SupplierRepository implements BaseRepositoryInterface {


    public function save(Supplier $supplier)
    {
        $supplier->save();

        return $supplier;
    }

    public function getSuppliers($br_id = null)
    {
        return Supplier::active()
            ->whereNested(function ($q) use ($br_id) {
                if ( !is_null($br_id) ) {
                    $q->where('br_id', $br_id);
                }
            })
            ->orderBy('br_id')
            ->orderBy('name')
            ->orderBy('type')
            ->get();
    }

    public function getTableData()
    {
        $currentUser = Session::get('currentUser');

        if ( !is_null($currentUser->employee) ) return $this->getSuppliers($currentUser->employee->br_id);

        return $this->getSuppliers();
    }

    public function getTableColumns()
    {
        return [
            ['column' => 'Supplier', 'width' => '1'],
            ['column' => 'Type', 'width' => '1'],
            ['column' => 'Address', 'width' => '2'],
            ['column' => 'Contacts', 'width' => '1'],
            ['column' => 'Action', 'width' => '1']
        ];
    }
}
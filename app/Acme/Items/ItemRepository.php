<?php  namespace Acme\Items; 

use Acme\Base\BaseRepositoryInterface;
use Item;
use Session;

class ItemRepository implements BaseRepositoryInterface {

	/**
	 * @param Item $item
	 * @return bool
	 */
	public function save(Item $item)
	{
		return $item->save();
	}

	public function getTableData()
	{
		$currentUser = Session::get('currentUser');

		if ( isset($currentUser->employee->br_id) )
		{
			$branchId = $currentUser->employee->br_id;

			return Item::with('supplier')
				->whereHas('supplier', function($q) use($branchId) {
					$q->where('br_id', $branchId);
				})
				->orderBy('supplier_id')
				->get();
//			return Item::with(['supplier' => function($query) use($branchId){
//				$query->where('br_id', $branchId);
//				$query->orderBy('name');
//			}])
//				->orderBy('supplier_id')
//				->get();
		}

		return Item::with('supplier')
			->orderBy('supplier_id')
			->get();
	}

	public function getTableColumnsForSuppliersTable()
	{
		return [
			['column' => 'Image', 'width' => '1'],
			['column' => 'Name', 'width' => '1'],
			['column' => 'Details', 'width' => '1'],
			['column' => 'Type', 'width' => '1'],
			['column' => 'Unit of Measure', 'width' => '1'],
			['column' => 'Unit Price', 'width' => '1'],
			['column' => 'Size / Color / Other', 'width' => '1'],
			['column' => 'Action', 'width' => '1']
		];
	}

	public function getTableDataForSuppliersTable($supplierId, $isStandardMaterials = false)
	{
		return Item::where('supplier_id', $supplierId)
			->where('is_sm', $isStandardMaterials)
			->get();
	}

	public function getTableColumns()
	{
		return [
			['column' => 'Supplier', 'width' => '1'],
			['column' => 'Image', 'width' => '1'],
			['column' => 'Name', 'width' => '1'],
			['column' => 'Details', 'width' => '1'],
			['column' => 'Type', 'width' => '1'],
			['column' => 'Unit of Measure', 'width' => '1'],
			['column' => 'Unit Price', 'width' => '1'],
			['column' => 'Size / Color / Other', 'width' => '1'],
			['column' => 'Action', 'width' => '1']
		];
	}
}
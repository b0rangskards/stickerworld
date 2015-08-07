<?php  namespace Acme\LaborCosts; 

use Acme\Base\BaseRepositoryInterface;
use Config;
use Session;
use UtilityCost;

class UtilityCostRepository implements BaseRepositoryInterface {

	private $currentUser;

	function __construct()
	{
		$this->currentUser = Session::get('currentUser');
	}


	public function save(UtilityCost $utilityCost)
	{
		return $utilityCost->save();
	}

	public function getLaborTypes()
	{
		$branchId = isset($this->currentUser->employee->br_id)
			? $this->currentUser->employee->br_id
			: null;

		return is_null($branchId)
			? UtilityCost::lists('type', 'id')
			: UtilityCost::where('br_id', $branchId)
				->where('classification', Config::get('constants.CLASS_LABOR'))
				->lists('type', 'id');
	}

	public function getLogisticsTypes()
	{
		$branchId = isset($this->currentUser->employee->br_id)
			? $this->currentUser->employee->br_id
			: null;

		return is_null($branchId)
			? UtilityCost::lists('type', 'id')
			: UtilityCost::where('br_id', $branchId)
				->where('classification', Config::get('constants.CLASS_LOGISTICS'))
				->lists('type', 'id');

	}

	public function getLaborCostTableData()
	{
		if ( isset($this->currentUser->employee->br_id) ) return $this->getLaborCostsData($this->currentUser->employee->br_id);

		return $this->getLaborCostsData();
	}

	public function getLogisticsCostTableData()
	{
		if ( isset($this->currentUser->employee->br_id) ) return $this->getLogisticsCostsData($this->currentUser->employee->br_id);

		return $this->getLogisticsCostsData();
	}

	public function getLogisticsCostsData($br_id = null)
	{
		return UtilityCost::with('branch')
			->whereHas('branch', function ($q) use ($br_id) {
				if ( !is_null($br_id) ) {
					$q->where('br_id', $br_id);
				}
			})
			->where('classification', Config::get('constants.CLASS_LOGISTICS'))
			->orderBy('br_id')
			->orderBy('type')
			->get();
	}

	public function getLaborCostsData($br_id = null)
	{
		return UtilityCost::with('branch')
			->whereHas('branch', function ($q) use ($br_id) {
				if ( !is_null($br_id) ) {
					$q->where('br_id', $br_id);
				}
			})
			->where('classification', Config::get('constants.CLASS_LABOR'))
			->orderBy('br_id')
			->orderBy('type')
			->get();
	}

	public function getTableData()
	{
		// TODO: Implement getTableData() method.
	}

	public function getTableColumns()
	{
		return [
			['column' => 'Type', 'width' => '2'],
			['column' => 'Rate', 'width' => '2'],
			['column' => 'Remarks', 'width' => '2'],
			['column' => 'Action', 'width' => '1']
		];
	}
}
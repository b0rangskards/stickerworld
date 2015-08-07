<?php  namespace Acme\Projects; 

use Acme\Base\BaseRepositoryInterface;
use Acme\Facades\CartMaterials;
use Acme\Services\ProjectSessionService;
use Cart;
use Project;

class ProjectRepository implements BaseRepositoryInterface {

	private $projectSessionService;

	function __construct(ProjectSessionService $projectSessionService)
	{
		$this->projectSessionService = $projectSessionService;
	}

	public function save(Project $project)
	{
		return $project->save();
	}

	/* Functions Below for Create Project Page */

	public function addItemToCart($itemId, $qty)
	{
		return CartMaterials::insertItem($itemId, $qty);
	}

	public function addLaborCostToCart($utilityId, $noOfEmp, $noOfDays)
	{
		return CartMaterials::insertLaborCost($utilityId, $noOfEmp, $noOfDays);
	}

	public function addLogisticsCostToCart($utilityId, $noOfDeliveries)
	{
		return CartMaterials::insertUtilityCost($utilityId, $noOfDeliveries);
	}

	public function updateItemQuantityToCart($itemId, $qty)
	{
		return CartMaterials::updateItemQuantity($itemId, $qty);
	}

	public function updateUtilityQuantityToCart($itemId, $noOfEmp, $noOfDays)
	{
		return CartMaterials::updateUtilityQuantity($itemId, $noOfEmp, $noOfDays);
	}

	public function cancelMaterial($itemId)
	{
		$item = CartMaterials::findItem($itemId);

		$item->remove();

		return true;
	}

	public function saveToSession($name, $value)
	{
		switch ( $name ) {
			case 'name':
				return $this->projectSessionService->setName($value);
			case 'leadTime':
				return $this->projectSessionService->setLeadTime($value);
			case 'location':
				return $this->projectSessionService->setLocation($value);
			case 'client':
				return $this->projectSessionService->setClient($value);
			case 'salesrep':
				return $this->projectSessionService->setSalesRep($value);
			case 'currentDate':
				return $this->projectSessionService->setCurrentDate($value);
			case 'deadline':
				return $this->projectSessionService->setDeadline($value);
			case 'estimator':
				return $this->projectSessionService->setEstimator($value);
		}
	}

	public function getTableData()
	{
		// TODO: Implement getTableData() method.
	}

	public function getTableColumns()
	{
		return [
			['column' => 'Project', 'width' => '1'],
			['column' => 'Client', 'width' => '1'],
			['column' => 'Location', 'width' => '1'],
			['column' => 'Deadline', 'width' => '1'],
			['column' => 'Lead Time', 'width' => '1'],
			['column' => 'Status', 'width' => '1'],
			['column' => 'Cost', 'width' => '1'],
			['column' => 'SalesRep', 'width' => '1'],
			['column' => 'Estimator', 'width' => '1'],
			['column' => 'Action', 'width' => '1']
		];
	}
}
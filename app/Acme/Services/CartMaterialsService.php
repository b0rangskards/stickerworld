<?php  namespace Acme\Services; 

use Acme\Helpers\ProjectHelper;
use Cart;
use Config;
use GeneralSetting;
use Item;
use Log;
use UtilityCost;

class CartMaterialsService {

	private $contingencies;
	private $defaultTax;

	function __construct()
	{
		$this->contingencies = Config::get('constants.CONTINGENCIES');
		$this->defaultTax = (Config::get('constants.DEFAULT_TAX_RATE') / 100);
	}



	/* Extract to a Service Provider */
	// Todo
	public function computeCostEstimates($totalCost, $standardCost, $vat, $costMultiplier)
	{
		return round((($totalCost * $costMultiplier) + $standardCost) * ($vat + 1), 2);
	}

	public function generateCostEstimates($totalCost, $standardCost, $vat = 0.12, $lowRange = 1.75, $highRange = 3.5, $interval = 0.25)
	{
		foreach(range($lowRange, $highRange, $interval) as $costMultiplier)
		{
			$costMultiplierIndex = strval($costMultiplier);

			$generatedCostArray[$costMultiplierIndex] = $this->computeCostEstimates($totalCost, $standardCost, $vat, $costMultiplier);
		}
		return $generatedCostArray;
	}

	/* up to here */

	public function generateCostEstimatesFromCart($lowRange = 1.75, $highRange = 3.5, $interval = 0.25)
	{
		$vat = isset(GeneralSetting::first()->vat_rate)
			? (GeneralSetting::first()->vat_rate / 100)
			: $this->defaultTax;

		$totalCost = $this->getTotalCost();
		$standardCost = $this->getStandardTotalCost();

		return $this->generateCostEstimates($totalCost, $standardCost, $vat, $lowRange, $highRange, $interval);
	}

	public function getOrdinaryMaterials($isArray = false)
	{
		$items = [];

		if ( $isArray ) {
			foreach ( Cart::contents($isArray) as $item ) {
				if ( !$item['is_sm'] && $item['type'] == 'material' ) {
					$items[] = $item;
				}
			}
		} else {
			foreach ( Cart::contents($isArray) as $item ) {
				if ( !$item->is_sm && $item->type == 'material' ) {
					$items[] = $item;
				}
			}
		}

		return $items;
	}

	public function getStandardMaterials($isArray = false)
	{
		$items = [];
		if ( $isArray ) {
			foreach ( Cart::contents(true) as $item ) {
				if ( $item['is_sm'] && $item['type'] == 'material' ) {
					$items[] = $item;
				}
			}
		}else{
			foreach ( Cart::contents() as $item ) {
				if ( $item->is_sm && $item->type == 'material' ) {
					$items[] = $item;
				}
			}
		}
		return $items;
	}

	public function getLabors($isArray = false)
	{
		$items = [];

		if($isArray){
			foreach ( Cart::contents(true) as $item ) {
				if ( $item['type'] == 'labor' ) {
					$items[] = $item;
				}
			}
		}else{
			foreach ( Cart::contents() as $item ) {
				if ( $item->type == 'labor' ) {
					$items[] = $item;
				}
			}
		}

		return $items;
	}

	public function getLogistics($isArray = false)
	{
		$items = [];

		if($isArray){
			foreach ( Cart::contents(true) as $item ) {
				if ( $item['type'] == 'logistics' ) {
					$items[] = $item;
				}
			}
		}else{
			foreach ( Cart::contents() as $item ) {
				if ( $item->type == 'logistics' ) {
					$items[] = $item;
				}
			}
		}

		return $items;
	}


	public function getTotalCost($withContingencies = true)
	{
		return doubleval(Cart::total($withContingencies) - $this->getStandardTotalCost());
	}

	public function getStandardTotalCost()
	{
		$total = 0;
		foreach(Cart::contents() as $item)
		{
			if( $item->is_sm){
				$line_total = ProjectHelper::computeLineTotal($item->price, $item->quantity);
				$total += $line_total;
			}
		}
		return $total;
	}

	public function insertLaborCost($id, $noOfEmp, $noOfDays)
	{
		$utility = UtilityCost::findOrFail($id);
		$qty = $noOfEmp * $noOfDays;

		$id = 'UT' . $utility->id;

		if( $item = $this->findItem($id))
		{
			$item->noOfEmp += $noOfEmp;
			$item->noOfDays += $noOfDays;
			$item->quantity = ($item->noOfEmp * $item->noOfDays);
			return $item;
		}

		$item = [
			'id'       => $id,
			'name'     => $utility->present()->prettyType,
			'price'    => $utility->rate,
			'quantity' => $qty,
			'unit'     => 'staff',
			'noOfEmp'  => $noOfEmp,
			'noOfDays' => $noOfDays,
			'remarks'  => $utility->present()->prettyRemarks,
			'type'     => 'labor',
			'is_sm'    => false,
			'tax'      => $this->contingencies
		];

		Cart::insert($item);

		return true;
	}

	public function insertUtilityCost($id, $qty)
	{
		$utility = UtilityCost::findOrFail($id);

		$item = [
			'id' => 'UT' . $utility->id,
			'name' => $utility->present()->prettyType,
			'price' => $utility->rate,
			'quantity' => $qty,
			'unit' => 'lot',
			'remarks' => $utility->present()->prettyRemarks,
			'type' => 'logistics',
			'is_sm' => false,
			'tax' => $this->contingencies
		];

		Cart::insert($item);

		return true;
	}

	public function updateItemQuantity($itemId, $qty)
	{
		$item = $this->findItem($itemId);

		$item->quantity = $qty;

		return true;
	}

	public function updateUtilityQuantity($itemId, $noOfEmp, $noOfDays)
	{
		$item = $this->findItem($itemId);

		$item->quantity = ($noOfEmp * $noOfDays);
		$item->noOfEmp = $noOfEmp;
		$item->noOfDays = $noOfDays;

		return $item;
	}

	public function getItemLineTotal($itemId)
	{
		$item = $this->findItem($itemId);

		return number_format($item->total(), 2);
	}

	public function insertItem($itemId, $qty)
	{
		$itemObj = Item::findOrFail($itemId);

		$item = [
			'id' => $itemObj->id,
			'name' => $itemObj->present()->prettyName,
			'price' => $itemObj->unit_price,
			'quantity' => $qty,
			'unit' => $itemObj->unit_of_measure,
			'remarks' => $itemObj->present()->prettyRemarks,
			'type' => 'material',
			'is_sm' => boolval($itemObj->is_sm),
			'tax' => boolval($itemObj->is_sm) ? '0' : $this->contingencies
		];

		Cart::insert($item);

		return true;
	}

	public function findItem($itemId)
	{
		/* Not Efficient */
		foreach ( Cart::contents() as $item ) {
			if ( $itemId == $item->id ) {
				return $item;
			}
		}
		return false;
	}

	public function clearCart()
	{
		Cart::destroy();
	}

} 
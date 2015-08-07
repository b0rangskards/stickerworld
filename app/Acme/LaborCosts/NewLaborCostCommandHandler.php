<?php  namespace Acme\LaborCosts; 

use Auth;
use LaborCost;
use Laracasts\Commander\CommandHandler;
use UtilityCost;

class NewLaborCostCommandHandler implements CommandHandler {

	protected $repository;

	function __construct(UtilityCostRepository $repository)
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
		$branchId = Auth::user()->employee->br_id;

		$laborCost = UtilityCost::newLaborCost(
			$command->type,
			$command->rate,
			$command->remarks,
			$branchId
		);

		$this->repository->save($laborCost);
	}
}
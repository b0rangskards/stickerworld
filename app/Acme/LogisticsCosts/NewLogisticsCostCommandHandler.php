<?php  namespace Acme\LogisticsCosts; 

use Acme\LaborCosts\UtilityCostRepository;
use Auth;
use Laracasts\Commander\CommandHandler;
use UtilityCost;

class NewLogisticsCostCommandHandler implements CommandHandler {

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

		$logisticsCost = UtilityCost::newLogisticsCost(
			$command->type,
			$command->rate,
			$command->remarks,
			$branchId
		);

		$this->repository->save($logisticsCost);
	}
}
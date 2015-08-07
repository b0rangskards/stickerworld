<?php  namespace Acme\LaborCosts; 

use Laracasts\Commander\CommandHandler;
use UtilityCost;

class UpdateLaborCostCommandHandler implements CommandHandler {

	private $repository;

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
		$laborCost = UtilityCost::updateUtilityCost(
			$command->id,
			$command->type,
			$command->rate,
			$command->remarks
		);

		$this->repository->save($laborCost);
	}
}
<?php  namespace Acme\LogisticsCosts; 

use Acme\LaborCosts\UtilityCostRepository;
use Laracasts\Commander\CommandHandler;
use UtilityCost;

class UpdateLogisticsCostCommandHandler implements CommandHandler {

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
		$logisticsCost = UtilityCost::updateUtilityCost(
			$command->id,
			$command->type,
			$command->rate,
			$command->remarks
		);

		$this->repository->save($logisticsCost);
	}
}
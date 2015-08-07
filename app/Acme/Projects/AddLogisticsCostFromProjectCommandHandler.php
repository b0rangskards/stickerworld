<?php  namespace Acme\Projects; 

use Laracasts\Commander\CommandHandler;

class AddLogisticsCostFromProjectCommandHandler implements CommandHandler {

	protected $repository;

	function __construct(ProjectRepository $repository)
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
		$this->repository->addLogisticsCostToCart(
			$command->type,
			$command->no_of_deliveries
		);
	}
}
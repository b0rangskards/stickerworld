<?php  namespace Acme\Projects; 

use Laracasts\Commander\CommandHandler;

class UpdateLogisticsQuantityCommandHandler implements CommandHandler {

	private $repository;

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
		$this->repository->updateItemQuantityToCart(
			$command->id,
			$command->qty
		);
	}
}
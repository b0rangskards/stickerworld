<?php  namespace Acme\Projects; 

use Laracasts\Commander\CommandHandler;

class UpdateMaterialQuantityCommandHandler implements CommandHandler {

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
		$this->repository->updateItemQuantityToCart($command->item_id, $command->qty);
	}
}
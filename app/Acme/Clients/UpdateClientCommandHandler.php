<?php  namespace Acme\Clients; 

use Client;
use Laracasts\Commander\CommandHandler;

class UpdateClientCommandHandler implements CommandHandler {

	private $repository;

	/**
	 * @param ClientRepository $repository
	 */
	function __construct(ClientRepository $repository)
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
		$client = Client::updateClient(
			$command->id,
			$command->name,
			$command->address,
			$command->contact_no
		);

		$this->repository->save($client);
	}
}
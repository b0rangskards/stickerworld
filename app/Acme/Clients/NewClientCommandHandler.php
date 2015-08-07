<?php  namespace Acme\Clients; 

use Client;
use Laracasts\Commander\CommandHandler;

class NewClientCommandHandler implements CommandHandler {

	private $repository;

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
		$client = Client::newClient(
			$command->br_id,
			$command->name,
			$command->address,
			$command->contact_no
		);

		$this->repository->save( $client);
	}
}
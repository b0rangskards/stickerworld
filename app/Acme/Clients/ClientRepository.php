<?php  namespace Acme\Clients; 

use Acme\Base\BaseRepositoryInterface;
use Client;
use Session;
use User;

class ClientRepository implements BaseRepositoryInterface {

	public function save(Client $client)
	{
		return $client->save();
	}

	public function getTableData()
	{
		$currentUser = Session::get('currentUser');

		if ( !is_null($currentUser->employee) ) {
			$branchId = $currentUser->employee->br_id;

			return Client::where('br_id', $branchId)
				->orderBy('name')
				->get();
		}
		return Client::all();
	}

	public function getTableColumns()
	{
		return [
			['column' => 'Client', 'width' => '2'],
			['column' => 'Address', 'width' => '2'],
			['column' => 'Contact No.', 'width' => '2'],
			['column' => 'Action', 'width' => '1']
		];
	}

	public function getClientData($query, User $user)
	{
		return !isset($user->employee->br_id)
			? Client::select(['id', 'name'])->where('name', 'like', "%$query%")->get()
			: Client::select(['id', 'name'])
				->where('name', 'like', "%$query%")
				->where('br_id', $user->employee->br_id)
				->get();
	}
}
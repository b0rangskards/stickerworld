<?php  namespace Acme\Services; 

use Carbon\Carbon;
use Client;
use Employee;
use Session;

class ProjectSessionService {

	private $sessionKey = 'project_item';

	public $keys = [
		'name'        => 'project_item.name',
		'location'    => 'project_item.location',
		'leadtime'    => 'project_item.leadtime',
		'client'      => 'project_item.client',
		'salesRep'    => 'project_item.salesRep',
		'currentDate' => 'project_item.currentDate',
		'deadline'    => 'project_item.deadline',
		'estimator'   => 'project_item.estimator'
	];

	public function clearProjectSession()
	{
		foreach($this->keys as $key){
			Session::forget($key);
		}
	}


	/**
	 * @return mixed
	 */
	public function getEstimator()
	{
		$estimatorId = Session::get($this->keys['estimator']);

		if ( !isset($estimatorId) ) return false;

		$estimator = Employee::findOrFail($estimatorId);

		return ucwords($estimator->present()->shortFullName);
	}

	public function getEstimatorId()
	{
		$estimatorId = Session::get($this->keys['estimator']);

		return isset($estimatorId) ? $estimatorId : false;
	}

	/**
	 * @param $estimatorId
	 * @return
	 * @internal param mixed $estimator
	 */
	public function setEstimator($estimatorId)
	{
		Session::put($this->keys['estimator'], $estimatorId);

		return $estimatorId;
	}

	/**
	 * @return mixed
	 */
	public function getDeadline()
	{
		$deadline = Session::get($this->keys['deadline']);

		if ( !isset($deadline) ) return false;

		return Carbon::parse($deadline)->format('j F Y');
	}

	public function getDeadlineValue()
	{
		$deadline = Session::get($this->keys['deadline']);

		if ( !isset($deadline) ) return null;

		return Carbon::parse($deadline)->format('Y-m-d');
	}

	/**
	 * @param mixed $deadline
	 * @return mixed
	 */
	public function setDeadline($deadline)
	{
		Session::put($this->keys['deadline'], $deadline);

		return $deadline;
	}

	/**
	 * @return mixed
	 */
	public function getCurrentDate()
	{
		$currentDate = Session::get($this->keys['currentDate']);

		if ( !isset($currentDate) ) return false;

		return Carbon::parse($currentDate)->format('j F Y');
	}

	public function getCurrentDateValue()
	{
		$currentDate = Session::get($this->keys['currentDate']);

		if ( !isset($currentDate) ) return null;

		return Carbon::parse($currentDate)->format('Y-m-d');
	}

	/**
	 * @param mixed $currentDate
	 * @return mixed
	 */
	public function setCurrentDate($currentDate)
	{
		Session::put($this->keys['currentDate'], $currentDate);

		return $currentDate;
	}
	/**
	 * @return mixed
	 */
	public function getSalesRep()
	{
		$salesRepId = Session::get($this->keys['salesRep']);

		if ( !isset($salesRepId) ) return false;

		$salesRep = Employee::findOrFail($salesRepId);

		return ucwords($salesRep->present()->shortFullName);
	}

	public function getSalesRepId()
	{
		$salesRepId = Session::get($this->keys['salesRep']);

		return isset($salesRepId) ? $salesRepId : false;
	}

	/**
	 * @param mixed $salesRep
	 */
	public function setSalesRep($salesRep)
	{
		Session::put($this->keys['salesRep'], $salesRep);

		return $salesRep;
	}


	/**
	 * @return mixed
	 */
	public function getClient()
	{
		$clientId = Session::get($this->keys['client']);

		if ( !isset($clientId) ) return false;

		$client = Client::findOrFail($clientId);

		return ucwords($client->name);
	}

	public function getClientId()
	{
		$clientId = Session::get($this->keys['client']);

		return isset($clientId) ? $clientId : false;
	}

	/**
	 * @param mixed $client
	 */
	public function setClient($clientId)
	{
		Session::put($this->keys['client'], $clientId);

		return $clientId;
	}

	/**
	 * @return mixed
	 */
	public function getLocation()
	{
		$location = Session::get($this->keys['location']);

		if ( !isset($location) ) return false;

		return $location;
	}

	/**
	 * @param mixed $location
	 * @return mixed
	 */
	public function setLocation($location)
	{
		Session::put($this->keys['location'], $location);

		return $location;
	}


	/**
	 * @return mixed
	 */
	public function getLeadTime()
	{
		$lead = Session::get($this->keys['leadtime']);

		if ( !isset($lead) ) return false;

		return $lead;
	}

	/**
	 * @param mixed $leadTime
	 * @return mixed
	 */
	public function setLeadTime($leadTime)
	{
		Session::put($this->keys['leadtime'], $leadTime);

		return $leadTime;
	}

	/**
	 * @return mixed
	 */
	public function getName()
	{
		$name = Session::get($this->keys['name']);

		if(!isset($name)) return false;

		return $name;
	}

	/**
	 * @param mixed $name
	 * @return mixed|string
	 */
	public function setName($name)
	{
		$name = ucwords($name);

		Session::put($this->keys['name'], $name);

		return $name;
	}



} 
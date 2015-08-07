<?php  namespace Acme\Projects; 

class NewProjectCommand {

	public $client;

	public $salesrep;

	public $estimator;

	public $name;

	public $location;

	public $leadTime;

	public $deadline;

	public $currentDate;

	public $cost_multiplier;

	public $items;

	public $labors;

	public $logistics;

	public $sub_total_cost;

	public $contingencies;

	public $standard_materials_cost;

	public $vat_rate;

	function __construct($client, $contingencies, $cost_multiplier, $currentDate, $deadline, $estimator, $items, $labors, $leadTime, $location, $logistics, $name, $salesrep, $standard_materials_cost, $sub_total_cost, $vat_rate)
	{
		$this->client = $client;
		$this->contingencies = $contingencies;
		$this->cost_multiplier = $cost_multiplier;
		$this->currentDate = $currentDate;
		$this->deadline = $deadline;
		$this->estimator = $estimator;
		$this->items = $items;
		$this->labors = $labors;
		$this->leadTime = $leadTime;
		$this->location = $location;
		$this->logistics = $logistics;
		$this->name = $name;
		$this->salesrep = $salesrep;
		$this->standard_materials_cost = $standard_materials_cost;
		$this->sub_total_cost = $sub_total_cost;
		$this->vat_rate = $vat_rate;
	}


}
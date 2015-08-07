<?php

use Laracasts\Presenter\PresentableTrait;

class ProjectLaborCost extends \Eloquent {

	use PresentableTrait;

	protected $fillable = ['proj_id', 'utility_id', 'rate', 'no_of_days', 'no_of_emp'];

	public $timestamps = false;

	protected $presenter = 'Acme\Presenters\ProjectLaborCostPresenter';

	public static function saveLabors(array $labors, $projectId)
	{
		$laborsSaved = [];

		if(count($labors) < 1) return false;

		foreach($labors as $labor){
			$utilityId = static::extractIdFromCart($labor['id']);

			if(!is_null(UtilityCost::find($utilityId))) {
				static::createLabor($projectId, $utilityId, $labor['price'], $labor['noOfEmp'], $labor['noOfDays']);
				$laborsSaved[] = $labor['id'];
			}
		}
		return $laborsSaved;
	}

	public static function createLabor($proj_id, $utility_id, $rate, $no_of_emp, $no_of_days)
	{
		$labor = new static(compact('proj_id', 'utility_id', 'rate', 'no_of_emp', 'no_of_days'));
		$labor->save();
		return $labor;
	}

	public static function extractIdFromCart($cartId)
	{
		return str_replace('UT', '', $cartId);
	}

	public function getQuantity()
	{
		return $this->no_of_emp * $this->no_of_days;
	}

	public function utility()
	{
		return $this->belongsTo('UtilityCost', 'utility_id');
	}

	public function project()
	{
		return $this->belongsTo('Project', 'proj_id');
	}


}
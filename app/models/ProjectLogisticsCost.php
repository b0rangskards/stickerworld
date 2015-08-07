<?php

use Laracasts\Presenter\PresentableTrait;

class ProjectLogisticsCost extends \Eloquent {

	use PresentableTrait;

	protected $fillable = ['proj_id', 'utility_id', 'no_of_deliveries', 'rate'];

	public $timestamps = false;

	protected $presenter = 'Acme\Presenters\ProjectLogisticsCostPresenter';

	public static function saveLogistics(array $items, $projectId)
	{
		$itemsSaved = [];

		if ( count($items) < 1 ) return false;

		foreach ( $items as $logistics ) {
			$utilityId = static::extractIdFromCart($logistics['id']);

			if ( !is_null(UtilityCost::find($utilityId)) ) {
				static::createLogistics($projectId, $utilityId, $logistics['quantity'], $logistics['price']);
				$itemsSaved[] = $logistics['id'];
			}
		}
		return $itemsSaved;
	}

	public static function createLogistics($proj_id, $utility_id, $no_of_deliveries, $rate)
	{
		$logistics = new static(compact('proj_id', 'utility_id', 'no_of_deliveries', 'rate'));
		$logistics->save();
		return $logistics;
	}

	public static function extractIdFromCart($cartId)
	{
		return str_replace('UT', '', $cartId);
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
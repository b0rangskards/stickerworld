<?php

use Acme\Helpers\InputConverter;
use Laracasts\Presenter\PresentableTrait;

class UtilityCost extends \Eloquent {

	use PresentableTrait;

	protected $fillable = ['br_id', 'classification', 'type', 'rate', 'remarks'];

	/**
	 * Path to the presenter.
	 *
	 * @var string
	 */
	protected $presenter = 'Acme\Presenters\UtilityCostPresenter';

	public static function newLaborCost($type, $rate, $remarks, $br_id)
	{
		$laborCost = new static(compact('br_id', 'type', 'rate', 'remarks'));

		$laborCost->classification = Config::get('constants.CLASS_LABOR');

		return $laborCost;
	}

	public static function newLogisticsCost($type, $rate, $remarks, $br_id)
	{
		$logisticsCost = new static(compact('br_id', 'type', 'rate', 'remarks'));

		$logisticsCost->classification = Config::get('constants.CLASS_LOGISTICS');

		return $logisticsCost;
	}

	public static function updateUtilityCost($id, $type, $rate, $remarks)
	{
		$utilityCost = static::find($id);

		$utilityCost->type = $type;
		$utilityCost->rate = $rate;
		$utilityCost->remarks = $remarks;

		$utilityCost->remarks = $remarks;

		return $utilityCost;
	}

	public function branch()
	{
		return $this->belongsTo('Branch', 'br_id');
	}

	/* Mutators */

	public function setTypeAttribute($value)
	{
		$this->attributes['type'] = InputConverter::cleanInput($value);
	}

	public function setClassificationAttribute($value)
	{
		$this->attributes['classification'] = InputConverter::cleanInput($value);
	}

	public function setRemarksAttribute($value)
	{
		$this->attributes['remarks'] = ucwords($value);
	}
}
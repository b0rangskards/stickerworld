<?php

class ProjectGeneratedCost extends \Eloquent {

	protected $fillable = ['sub_total_cost', 'standard_materials_cost', 'cost_multiplier', 'vat_rate', 'contingencies'];

	public $timestamps = false;

	public static function createCost($sub_total_cost, $standard_materials_cost, $cost_multiplier, $vat_rate, $contingencies)
	{
		$cost = new static(compact('sub_total_cost', 'standard_materials_cost', 'cost_multiplier', 'vat_rate', 'contingencies'));

		return $cost->save() ? $cost : false;
	}

}
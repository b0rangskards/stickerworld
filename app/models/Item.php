<?php

use Acme\Helpers\InputConverter;
use Laracasts\Presenter\PresentableTrait;

class Item extends \Eloquent {

	use PresentableTrait;

	protected $fillable = ['supplier_id', 'name', 'type', 'unit_of_measure', 'unit_price', 'details', 'remarks', 'image', 'is_sm'];

	/**
	 * Path to the presenter for a item.
	 *
	 * @var string
	 */
	protected $presenter = 'Acme\Presenters\ItemPresenter';

	public static function newItem($supplier_id, $name, $type, $unit_of_measure, $unit_price, $details, $remarks, $is_sm)
	{
		$item = new static(compact('supplier_id', 'name', 'type', 'unit_of_measure', 'unit_price', 'details', 'remarks'));

		$item->is_sm = $is_sm == 1 ? :0;

		return $item;
	}

	public static function updateItem($id, $name, $type, $unit_of_measure, $unit_price, $details, $remarks)
	{
		$item = static::findOrFail($id);
		$item->name = $name;
		$item->type = $type;
		$item->unit_of_measure = $unit_of_measure;
		$item->unit_price = $unit_price;
		$item->details = $details;
		$item->remarks = $remarks;

		return $item;
	}

	public function supplier()
	{
		return $this->belongsTo('Supplier', 'supplier_id');
	}

	/* Scope Query */

	public function scopeSearch($query, $keyword)
	{
		return $query->where('name', 'like', "%$keyword%");
	}

	/* Mutators */

	public function setNameAttribute($value)
	{
		$this->attributes['name'] = InputConverter::cleanInput($value);
	}

	public function setTypeAttribute($value)
	{
		$this->attributes['type'] = InputConverter::cleanInput($value);
	}

	public function setUnitOfMeasureAttribute($value)
	{
		$this->attributes['unit_of_measure'] = InputConverter::cleanInput($value);
	}

	public function setUnitPriceAttribute($value)
	{
		$this->attributes['unit_price'] = InputConverter::cleanInput($value);
	}

	public function setDetailsAttribute($value)
	{
		$this->attributes['details'] = InputConverter::cleanInput($value);
	}

	public function setRemarksAttribute($value)
	{
		$this->attributes['remarks'] = InputConverter::cleanInput($value);
	}
}
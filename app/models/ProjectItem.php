<?php

use Laracasts\Presenter\PresentableTrait;

class ProjectItem extends \Eloquent {

	use PresentableTrait;

	protected $fillable = ['proj_id', 'item_id', 'quantity', 'unit_price'];

	public $timestamps = false;

	protected $presenter = 'Acme\Presenters\ProjectItemPresenter';

	public static function saveItems(array $items, $projectId)
	{
		$itemsSaved = [];

		if ( count($items) < 1 ) return false;

		foreach ( $items as $item )
		{
			if ( !is_null(Item::find($item['id'])) )
			{
				static::createItem($projectId, $item['id'], $item['quantity'], $item['price']);
				$itemsSaved[] = $item['id'];
			}
		}
		return $itemsSaved;
	}

	public static function createItem($proj_id, $item_id, $quantity, $unit_price)
	{
		$item = new static(compact('proj_id', 'item_id', 'quantity', 'unit_price'));
		$item->save();
		return $item;
	}

	public function project()
	{
		return $this->belongsTo('Project', 'proj_id');
	}

	public function item()
	{
		return $this->belongsTo('Item', 'item_id');
	}

}
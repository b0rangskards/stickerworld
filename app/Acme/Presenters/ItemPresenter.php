<?php  namespace Acme\Presenters; 

use Config;
use Laracasts\Presenter\Presenter;

class ItemPresenter extends Presenter {

	public function prettyName()
	{
		return ucwords($this->name);
	}

	public function prettyDetails()
	{
		return $this->details ? ucwords($this->details) : '';
	}

	public function prettyType()
	{
		return ucwords($this->type);
	}

	public function prettyUm()
	{
		return ucwords($this->unit_of_measure);
	}

	public function prettyPrice()
	{
		return 'P '.number_format($this->unit_price, 2);
	}

	public function formattedPrice()
	{
		return number_format($this->unit_price, 2);
	}

	public function prettyRemarks()
	{
		return $this->remarks ? ucwords($this->remarks):'';
	}

	public function imageUrl()
	{
		return $this->image
			 ? Config::get('constants.ITEM_PICTURE_URL') . $this->image
			 : Config::get('constants.NO_IMG_URL');
	}

}
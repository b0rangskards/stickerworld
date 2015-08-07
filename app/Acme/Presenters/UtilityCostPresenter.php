<?php  namespace Acme\Presenters; 

use Laracasts\Presenter\Presenter;

class UtilityCostPresenter extends Presenter {

	public function prettyType()
	{
		return ucwords($this->type);
	}

	public function prettyRate()
	{
		return 'PHP '.number_format($this->rate, 2);
	}

	public function prettyRemarks()
	{
		return ucwords($this->remarks);
	}

} 
<?php  namespace Acme\Presenters; 

use Laracasts\Presenter\Presenter;

class ProjectItemPresenter extends Presenter {

	public function prettyPrice()
	{
		return 'PHP '.number_format($this->unit_price, 2);
	}

	public function prettyLineTotal()
	{
		return 'PHP '.number_format($this->unit_price * $this->quantity, 2);
	}

} 
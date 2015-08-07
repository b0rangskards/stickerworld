<?php  namespace Acme\Presenters; 

use Laracasts\Presenter\Presenter;

class ProjectLogisticsCostPresenter extends Presenter {

	public function prettyRate()
	{
		return 'PHP '.number_format($this->rate, 2);
	}

	public function prettyLineTotal()
	{
		return 'PHP '.number_format($this->rate * $this->no_of_deliveries, 2);
	}

} 
<?php  namespace Acme\Presenters; 

use Laracasts\Presenter\Presenter;

class ProjectLaborCostPresenter extends Presenter {

	public function prettyLineTotal()
	{
		return 'PHP '.number_format($this->getQuantity() * $this->rate, 2);
	}

	public function prettyRate()
	{
		return 'PHP '.number_format($this->rate, 2);
	}

	public function getQuantity()
	{
		return $this->no_of_emp * $this->no_of_days;
	}

} 
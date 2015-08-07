<?php  namespace Acme\Presenters; 

use Laracasts\Presenter\Presenter;

class ClientPresenter extends Presenter {

	public function prettyName()
	{
		return ucwords($this->name);
	}

	public function prettyAddress()
	{
		return ucwords($this->address);
	}

} 
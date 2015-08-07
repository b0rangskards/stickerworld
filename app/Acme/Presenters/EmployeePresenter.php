<?php  namespace Acme\Presenters; 

use Laracasts\Presenter\Presenter;

class EmployeePresenter extends Presenter {

    public function fullName()
    {
        $fullName = $this->lastname . ', ' . $this->firstname . ' ' . substr($this->middlename, 0, 1) . '.';
        return ucwords($fullName);
    }

	public function shortFullName()
	{
		return ucwords($this->firstname. ' ' . $this->lastname);
	}

    public function prettyDesignation()
    {
        return ucwords($this->designation);
    }

} 
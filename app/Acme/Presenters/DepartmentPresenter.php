<?php  namespace Acme\Presenters; 

use Laracasts\Presenter\Presenter;

class DepartmentPresenter extends Presenter {

    public function prettyName()
    {
        return ucwords($this->name);
    }

} 
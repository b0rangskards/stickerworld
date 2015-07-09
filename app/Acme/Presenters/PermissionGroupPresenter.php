<?php  namespace Acme\Presenters; 

use Laracasts\Presenter\Presenter;

class PermissionGroupPresenter extends Presenter {

    public function prettyName()
    {
        return ucwords($this->name);
    }
} 
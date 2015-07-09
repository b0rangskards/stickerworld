<?php  namespace Acme\Presenters; 

use Laracasts\Presenter\Presenter;

class PermissionPresenter extends Presenter {

    public function prettyName()
    {
        return ucwords($this->name);
    }

    public function prettyDescription()
    {
        return ucwords($this->description);
    }

} 
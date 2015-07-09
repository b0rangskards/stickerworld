<?php  namespace Acme\Presenters; 

use Laracasts\Presenter\Presenter;

class RolePresenter extends Presenter {

    public function prettyRoleName()
    {
        return ucfirst($this->name);
    }

    public function prettyDescription()
    {
        return ucwords($this->description);
    }
}
<?php  namespace Acme\Presenters; 

use Laracasts\Presenter\Presenter;

class ContactPresenter extends Presenter {

    public function prettyType()
    {
        return ucwords($this->type);
    }

} 
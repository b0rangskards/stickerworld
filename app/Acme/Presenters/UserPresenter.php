<?php  namespace Acme\Presenters; 

use Carbon\Carbon;
use Laracasts\Presenter\Presenter;

class UserPresenter extends Presenter {

    public function lastLoginHuman()
    {
        return $this->last_login ? Carbon::parse($this->last_login)->diffForHumans() : '';
    }

} 
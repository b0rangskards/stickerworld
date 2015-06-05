<?php  namespace Acme\Presenters; 

use Laracasts\Presenter\Presenter;

class UserPresenter extends Presenter {

    public function lastLoginHuman()
    {
        return $this->last_login ? date('F, d Y h:i:s a', strtotime($this->last_login)) : '';
    }

} 
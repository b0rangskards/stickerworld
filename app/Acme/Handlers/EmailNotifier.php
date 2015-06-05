<?php  namespace Acme\Handlers; 

use Acme\Mailers\UserMailer;
use Acme\Registration\Events\UserHasRegistered;
use Laracasts\Commander\Events\EventListener;

class EmailNotifier extends EventListener {

    private $mailer;

    function __construct(UserMailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function whenUserHasRegistered(UserHasRegistered $event)
    {
        $this->mailer->sendConfirmationMessageTo($event->user);
    }


} 
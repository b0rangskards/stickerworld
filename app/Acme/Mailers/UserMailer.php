<?php  namespace Acme\Mailers; 

use URL;
use User;

class UserMailer extends Mailer {

    /**
     * @param User $user
     */
    public function sendConfirmationMessageTo(User $user )
    {
        $subject = 'Welcome to Stickerworld Admin!';

        $view = 'emails.registration.confirm';

        $link = URL::route('user_activation_path', $user->activation_code);

        return $this->sendTo($user, $subject, $view, ['link' => $link]);
    }

} 
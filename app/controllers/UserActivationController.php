<?php

use Acme\Activation\ActivateUserCommand;
use Acme\Forms\UserActivationForm;
use Acme\Registration\InvalidActivationCodeException;

class UserActivationController extends BaseController {


    private $userActivationForm;

    function __construct(UserActivationForm $userActivationForm)
    {
        $this->userActivationForm = $userActivationForm;
    }

    /**
     * @param $activationCode
     */
    public function index($activationCode)
    {
        if ( !$activationCode ) {
            throw new InvalidActivationCodeException('Invalid Activation code', []);
        }

        $user = User::whereActivationCode($activationCode)->first();
        if ( !$user ) {
            throw new InvalidActivationCodeException('Invalid Activation code', []);
        }

        return View::make('registration.activate')
               ->with('activationCode', $activationCode);
    }


    public function store()
    {
        $activationCode = Input::get('activation_code');

        if ( !$activationCode ) {
            throw new InvalidActivationCodeException('Invalid Activation code', []);
        }

        $user = User::whereActivationCode( $activationCode)->first();
        if ( !$user ) {
            throw new InvalidActivationCodeException('Invalid Activation code', []);
        }

        $this->userActivationForm->validate(Input::except('activation_code'));

        $this->execute( ActivateUserCommand::class);

        Flash::message('You have successfully activated your account.');

        return Redirect::home();
    }


}
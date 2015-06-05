<?php
namespace FunctionalTester;

use FunctionalTester;
use RegistrationPage;
use SignInPage;

class MemberSteps extends FunctionalTester
{

    protected $I;

    public $adminRole = '1';

    public $adminUsername = 'admin';

    public $adminPassword = '1234';

    public $adminEmail = 'admin@gmail.com';


    function __construct($scenario)
    {
        parent::__construct($scenario);
        $this->I = $this;
    }

    public function signInAsAdmin()
    {
        $this->createUser($this->adminRole, $this->adminUsername, $this->adminPassword, $this->adminEmail);
        $this->login($this->adminUsername, $this->adminPassword);
    }

    public function createUser($role_id, $username, $password, $email, $recstat = 'A')
    {
        $this->I->haveAnAccount(compact('role_id', 'username', 'password', 'email', 'recstat'));
    }

    public function login($username, $password)
    {
        $this->I->amOnPage(SignInPage::$URL);
        $this->I->fillField(SignInPage::$usernameField, $username);
        $this->I->fillField(SignInPage::$passwordField, $password);
        $this->I->click(SignInPage::$signInButton);
    }

    public function registerAUser($role_id, $email)
    {
        $this->I->amOnPage(RegistrationPage::$URL);

        $this->I->selectOption(RegistrationPage::$roleIdOption, $role_id);

        $this->I->fillField(RegistrationPage::$emailField, $email);

        $this->I->click(RegistrationPage::$formSubmitButton);

        $this->I->seeInLastEmailTo($email, 'Please follow the link below to Activate your account');

        $this->I->seeInCurrentUrl(RegistrationPage::$URL);
    }
}
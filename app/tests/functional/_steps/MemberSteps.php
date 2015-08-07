<?php
namespace FunctionalTester;

use Auth;
use FunctionalTester;
use RegistrationPage;
use SignInPage;
use URL;
use User;

class MemberSteps extends FunctionalTester
{

    protected $I;

    function __construct($scenario)
    {
        parent::__construct($scenario);
        $this->I = $this;
    }

    public function signInAsAdmin()
    {
        $admin = $this->I->have('admin_user');

        $this->login($admin->username, '1234');

        return $admin;
    }

//    public function createAccount($roleName, $attributes = [])
//    {
//        $roleId = ['role_id' => $this->getRoleId($roleName)];
//
//        $attributes = array_merge($attributes, $roleId);
//
//        return $this->I->have('User', $attributes);
//    }

	public function signInAs($roleName, $attributes = [])
	{
		$roleId = ['role_id' => $this->getRoleId($roleName)];

		$attributes = array_merge($attributes, $roleId);

		$user = $this->I->have('User', $attributes);

		$this->login($user->username, $attributes['password']);

		$employee = $this->I->have('Employee', [
			'user_id' => $user->id
		]);

		Auth::logout();

		Auth::loginUsingId($user->id);

		return $user;
	}


	public function signInAsManager()
    {
	  $attributes = [
		  'password' => '1234',
		  'recstat' => 'A'
	  ];

       $user = $this->signInAs('manager', $attributes);

	    return $user;
    }

    public function signInAsModerator()
    {
        $user = $this->signInAs('moderator',
            [
                'password' => '1234',
                'recstat' => 'A'
            ]);

        $this->I->have('Employee', [
            'user_id' => $user->id
        ]);

        return $user;
    }

	public function signInAsEstimator()
	{
		$user = $this->signInAs('estimator',
			[
				'password' => '1234',
				'recstat' => 'A'
			]);

		$this->I->have('Employee', [
			'user_id' => $user->id
		]);

		return $user;
	}

	public function signInAsAccountant()
	{
		$user = $this->signInAs('accountant',
			[
				'password' => '1234',
				'recstat' => 'A'
			]);

		$this->I->have('Employee', [
			'user_id' => $user->id
		]);

		return $user;
	}

    protected function getRoleId($roleName)
    {
        switch($roleName) {
            case 'admin':
                return 1;
            case 'moderator':
                return 2;
            case 'manager':
                return 3;
            case 'estimator':
                return 4;
            case 'accountant':
                return 5;
        }
    }

    public function createUser($role_id, $username, $password, $email, $recstat = 'A')
    {
        return $this->I->haveAnAccount(compact('role_id', 'username', 'password', 'email', 'recstat'));
    }

    public function login($username, $password)
    {
        $this->I->amOnPage(SignInPage::$URL);
        $this->I->fillField(SignInPage::$usernameField, $username);
        $this->I->fillField(SignInPage::$passwordField, $password);
        $this->I->click(SignInPage::$signInButton);
    }

    public function logout()
    {
        $this->I->sendAjaxRequest('DELETE', URL::route('logout_path'));
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

    public function getUserByUsername($username)
    {
        return User::whereUsername($username)->first();
    }

    public function getUserById($id)
    {
        return User::findOrFail($id)->first();
    }

    public function deleteUserByUsername($username)
    {
        $user = $this->getUserByUsername($username);

        $user->delete();
    }

    public function deleteUserById($id)
    {
        $user = $this->getUserById($id);

        $user->delete();
    }
}
<?php
namespace AcceptanceTester;

use SignInPage;

class MemberSteps extends \AcceptanceTester
{

	protected $I;

	function __construct($scenario)
	{
		parent::__construct($scenario);
		$this->I = $this;
	}

    public function login($username, $password)
    {
	    $this->I->amOnPage(SignInPage::$URL);
	    $this->I->fillField(SignInPage::$usernameField, $username);
	    $this->I->fillField(SignInPage::$passwordField, $password);
	    $this->I->click(SignInPage::$signInButton);
    }

	public function signInAsManager()
    {
	    $this->login('manager', '1234');
    }

	public function signInAsAdmin()
    {
	    $this->login('admin', '1234');
    }

	public function registerAUser()
    {
    }

	public function logout()
    {
        $I = $this;
    }

	public function computeLineTotal($price, $qty)
	{
		return doubleval($price) * $qty;
	}

	public function computeTotalCost($subTotal, $contingencies)
	{
		return $subTotal + $contingencies;
	}

	public function computeCongencies($subTotal)
	{
		return $subTotal * 0.10;
	}
}
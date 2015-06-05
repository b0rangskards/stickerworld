<?php
use \FunctionalTester;

/**
 * @guy FunctionalTester\MemberSteps
 */
class RegisterUserWithValidAccountCest
{
    public function _before(FunctionalTester $I)
    {
        $I->resetEmails();

        $I->signInAsAdmin();
    }

    public function try_to_register_a_new_admin_user(FunctionalTester $I)
    {
        $email = 'admin_test@gmail.com';
        $role_id = '1';

        $this->register_a_user_with_valid_data($I, $role_id, $email);
    }

    protected function register_a_user_with_valid_data(FunctionalTester $I, $role_id, $email)
    {
        $this->register_a_user($I, $role_id, $email);

        $I->see('User Successfully Registered. An Email was sent to User.');

        $I->seeRecord('users', [
            'role_id' => $role_id,
            'email' => $email
        ]);

    }

    /**
     * @param FunctionalTester $I
     * @param $role_id
     * @param $email
     */
    protected function register_a_user(FunctionalTester $I, $role_id, $email)
    {
        $I->am('a registered user');
        $I->wantTo('create an account for new user');

        $I->registerAUser($role_id, $email);
    }

//    public function try_to_register_a_new_moderator_user(FunctionalTester $I)
//    {
//        $email = 'moderator_test@gmail.com';
//        $role_id = '2';
//
//        $this->register_a_user_with_valid_data($I, $role_id, $email);
//    }
//
//    public function try_to_register_a_new_estimator_user(FunctionalTester $I)
//    {
//        $email = 'estimator_test@gmail.com';
//        $role_id = '3';
//
//        $this->register_a_user_with_valid_data($I, $role_id, $email);
//    }
//
//    public function try_to_register_a_new_accountant_user(FunctionalTester $I)
//    {
//        $email = 'accountant_test@gmail.com';
//        $role_id = '4';
//
//        $this->register_a_user_with_valid_data($I, $role_id, $email);
//    }
}
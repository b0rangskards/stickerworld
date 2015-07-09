<?php
use \FunctionalTester;

/**
 * @guy FunctionalTester\MemberSteps
 */
class NewRoleCest
{

    private $invalidRoleNames = [
      '',
      'ds4324',
      'dsdsa$$#@',
      'dsad_dsada'
    ];

    public function _before(FunctionalTester $I)
    {
        $I->signInAsAdmin();
    }

    // tests
    public function try_to_add_new_role_with_valid_data(FunctionalTester $I)
    {
        $role = $I->buildDataFor('Role', [
            'name'   =>   'Public User'
        ]);

        $I->am('an admin user');

        $I->wantTo('add new role with valid data');

        $I->amOnPage(AccessControlPage::$URL);

        $response = $I->sendAjaxRequest('POST',
            URL::route('new_role_path'), $role
        );

        $I->seeResponseCodeIs(200);

        $params = $this->lowerCaseValuesFromArray($role);

        $I->seeRecord(AccessControlPage::$roleTableName, $params);

//        $I->see($this->validRoleName ,AccessControlPage::$tableElement . ' thead tr th');
    }

    public function try_to_add_new_role_with_invalid_data(FunctionalTester $I)
    {
        $invalidRole = null;

        $I->am('an admin user');

        $I->wantTo('add new role with invalid data');

        $I->amOnPage(AccessControlPage::$URL);

        foreach($this->invalidRoleNames as $invalidRoleName)
        {
            $invalidRole = $I->buildDataFor('Role', ['name'    =>  $invalidRoleName]);

            $response = $I->sendAjaxRequest('POST',
                URL::route('new_role_path'), $invalidRole
            );

            $I->seeResponseCodeIs(400);

            $I->dontSeeRecord(AccessControlPage::$roleTableName, $invalidRole);
        }
    }

    private function lowerCaseValuesFromArray($array)
    {
        foreach($array as $ind => $content){
            $array[$ind] = strtolower($content);
        }
        return $array;
    }

}
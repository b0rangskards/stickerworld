<?php
use \FunctionalTester;
use Laracasts\TestDummy\Factory;

/**
 * @guy FunctionalTester\MemberSteps
 */
class UpdatePermissionCest
{
    private $permission;

    private $newPermission;

    public function _before(FunctionalTester $I)
    {
        $I->signInAsAdmin();

        $this->permission = $I->have('Permission');

        $group = $I->have('PermissionGroup');

        $this->newPermission = $I->buildDataFor('Permission', [
            'group_id' => $group->id
        ]);
    }


    // tests
    public function try_to_update_permission_with_valid_data(FunctionalTester $I)
    {
        $I->am('an admin');

        $I->wantTo('update permission with valid data');

        $I->amOnPage(AccessControlPage::$URL);

        $this->newPermission['id'] = $this->permission->id;

        $I->sendAjaxRequest('PUT',
            URL::route('update_permission_path'), $this->newPermission
        );

        $I->seeResponseCodeIs(200);

        $I->seeRecord(AccessControlPage::$permissionTableName, [
            'id'          => $this->permission->id,
            'group_id'    => $this->newPermission['group_id'],
            'name'        => $this->newPermission['name'],
            'route'       => $this->newPermission['route'],
            'description' => $this->newPermission['description']
        ]);
    }

    /*
     * @after  try_to_update_permission_with_valid_data
     *
     */
    public function try_to_update_permission_with_existing_name(FunctionalTester $I)
    {
        $group = $I->have('PermissionGroup');

        $permission = $I->have('Permission', ['group_id' => $group->id]);

        $otherPermission = $I->have('Permission', ['group_id' => $group->id]);

        $I->am('an admin');

        $I->wantTo('update permission with existing name');

        $I->expect('an error');

        $I->amOnPage(AccessControlPage::$URL);

        $params = [
          'id'      =>  $permission->id,
          'group_id'=>  $permission->group_id,
          'name'    =>  $otherPermission->name,
          'route'   =>  $permission->route,
          'description' => $permission->description
        ];

        $I->sendAjaxRequest('PUT',
            URL::route('update_permission_path'), $params
        );

        $I->seeResponseCodeIs(400);

        $I->dontSeeRecord(AccessControlPage::$permissionTableName, $params);
    }

  /*
   * @after try_to_update_permission_with_existing_name
   *
   */
    public function try_to_update_permission_with_existing_route(FunctionalTester $I)
    {
        $group = $I->have('PermissionGroup');

        $permission = $I->have('Permission', ['group_id' => $group->id]);

        $otherPermission = $I->have('Permission', ['group_id' => $group->id]);

        $I->am('an admin');

        $I->wantTo('update permission with existing route');

        $I->expect('an error');

        $I->amOnPage(AccessControlPage::$URL);

        $params = [
            'id' => $permission->id,
            'group_id' => $permission->group_id,
            'name' => $permission->name,
            'route' => $otherPermission->route,
            'description' => $permission->description
        ];

        $I->sendAjaxRequest('PUT',
            URL::route('update_permission_path'), $params
        );

        $I->seeResponseCodeIs(400);

        $I->dontSeeRecord(AccessControlPage::$permissionTableName, $params);
    }

    /*
     * @after try_to_update_permission_with_existing_name
     *
     */
    public function try_to_update_permission_with_empty_name(FunctionalTester $I)
    {
        $group = $I->have('PermissionGroup');

        $permission = $I->have('Permission', ['group_id' => $group->id]);

        $otherPermission = $I->have('Permission', ['group_id' => $group->id]);

        $I->am('an admin');

        $I->wantTo('update permission with empty name');

        $I->expect('an error');

        $I->amOnPage(AccessControlPage::$URL);

        $params = [
            'id' => $permission->id,
            'group_id' => $permission->group_id,
            'name' => '',
            'route' => $permission->route,
            'description' => $permission->description
        ];

        $I->sendAjaxRequest('PUT',
            URL::route('update_permission_path'), $params
        );

        $I->seeResponseCodeIs(400);

        $I->dontSeeRecord(AccessControlPage::$permissionTableName, $params);
    }
}
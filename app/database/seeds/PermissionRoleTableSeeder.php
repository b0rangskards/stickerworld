<?php

class PermissionRoleTableSeeder extends Seeder {


    // just add roles here to add permissions and update except permissions below
    protected $roles = ['moderator', 'manager'];

    protected $moderatorPermissions = [
        'role' => [
          'id' => '2'
        ],
        'except' => [
            'group' => ['access_control']
        ]
    ];

    protected $managerPermissions = [
        'role' => [
            'id' => '3'
        ],
        'except' => [
            'group' => ['access_control', 'branch', 'department', 'user']
        ]
    ];

    protected $estimatorPermissions = [
        'role' => [
            'id' => '4'
        ]
    ];

    protected $accountantPermissions = [
        'role' => [
            'id' => '5'
        ]
    ];

    /**
     * @param $pGroupName
     * @return array
     */
    protected function getPermissionsByGroupName($pGroupName)
    {
        $permissions = [];

        $pGroup = PermissionGroup::whereName($pGroupName)->first();

        if ( $pGroup ) {
            $permissionIds = $pGroup->permissions()->lists('id');

            $permissions[] = $permissionIds;
            return $permissions;
        }
        return $permissions;
    }

    protected function getPermissions( $params)
    {
        $permissions = [];

        foreach($params as $index => $group) {

            if( $index === 'except') {
                foreach($group as $ind => $content) {
                    if( $ind === 'group') {

                        $pGroups = PermissionGroup::whereNotIn('name', $content)->lists('name');

                        foreach($pGroups as $pGroupName) {
                            $permissions[] = $this->getPermissionsByGroupName($pGroupName);
                        }
                    }
                }
            }
        }
        return array_flatten($permissions);
    }

    protected function addPermissions($roleId, $permissionIds)
    {
        foreach($permissionIds as $id)
        {
            PermissionRole::create([
                'role_id'       => $roleId,
                'permission_id' => $id
            ]);
        }
    }

    public function run()
	{
        foreach($this->roles as $role)
        {
            $rolePermission = $role . 'Permissions';

            $permissionIds = $this->getPermissions($this->{$rolePermission});

            $this->addPermissions($this->{$rolePermission}['role']['id'], $permissionIds);
        }
    }


}
<?php  namespace Acme\AccessControl\Permissions; 

class NewPermissionCommand {

    public $group_id;

    public $name;

    public $route;

    public $description;

    function __construct($group_id, $name, $route, $description)
    {
        $this->group_id = $group_id;
        $this->name = $name;
        $this->route = $route;
        $this->description = $description;
    }


} 
<?php  namespace Acme\AccessControl\Permissions; 

class UpdatePermissionCommand {

    public $id;

    public $group_id;

    public $name;

    public $route;

    public $description;

    function __construct($id, $name, $group_id, $route, $description)
    {
        $this->id = $id;
        $this->name = $name;
        $this->group_id = $group_id;
        $this->route = $route;
        $this->description = $description;
    }


}
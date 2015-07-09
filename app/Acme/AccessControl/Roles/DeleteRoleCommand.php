<?php  namespace Acme\AccessControl\Roles; 

class DeleteRoleCommand {

    public $id;

    function __construct($id)
    {
        $this->id = $id;
    }

} 
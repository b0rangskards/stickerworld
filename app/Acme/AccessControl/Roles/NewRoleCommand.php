<?php namespace Acme\AccessControl\Roles;


class NewRoleCommand {

    public $name;

    public $description;

    function __construct($name, $description)
    {
        $this->name = $name;

        $this->description = $description;
    }


} 
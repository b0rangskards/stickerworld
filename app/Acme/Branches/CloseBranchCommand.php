<?php  namespace Acme\Branches; 

class CloseBranchCommand {

    public $id;

    function __construct($id)
    {
        $this->id = $id;
    }

} 
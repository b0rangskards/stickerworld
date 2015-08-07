<?php  namespace Acme\Projects\Events; 

use Project;
use User;

class ProjectHasCreated {

	public $project;

	public $user;

	function __construct(Project $project, User $user)
	{
		$this->project = $project;
		$this->user = $user;
	}


} 
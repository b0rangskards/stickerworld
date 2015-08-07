<?php  namespace Acme\Helpers; 

use Employee;
use URL;

class NotificationMessagesHelper {

	public function projectConfirmationToAccountant($project, $fromUser)
	{
		$estimatorName = Employee::find($project->estimator_id)->present()->shortFullName;

		$data['from_userid'] = $fromUser->id;
		$data['to_userid'] = $project->salesrep_id;
		$data['title'] = 'New Project Created.';
		$data['content'] = $estimatorName." wants you to confirm the new project.";
		$data['link'] = URL::route('confirm_project_path', $project->name);

		return $data;
	}

} 
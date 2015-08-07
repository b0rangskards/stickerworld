<?php  namespace Acme\Projects; 

use Acme\Facades\CartMaterials;
use Acme\Facades\ProjectService;
use Auth;
use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;
use Project;
use ProjectGeneratedCost;
use ProjectItem;
use ProjectLaborCost;
use ProjectLogisticsCost;

class NewProjectCommandHandler implements CommandHandler {

	use DispatchableTrait;

	private $repository;

	function __construct(ProjectRepository $repository)
	{
		$this->repository = $repository;
	}


	/**
	 * Handle the command
	 *
	 * @param $command
	 * @return mixed
	 */
	public function handle($command)
	{
		$branch = Auth::user()->employee->br_id;

		$project = Project::newProject(
			$command->client,
			$branch,
			$command->salesrep,
			$command->estimator,
			$command->name,
			$command->location,
			$command->leadTime,
			$command->deadline,
			$command->currentDate
		);

		$projectCost = ProjectGeneratedCost::createCost(
			$command->sub_total_cost,
			$command->standard_materials_cost,
			$command->cost_multiplier,
			$command->vat_rate,
			$command->contingencies
		);

		$project->projgencost_id = $projectCost->id;

		$this->repository->save($project);

		$projectItems = ProjectItem::saveItems($command->items, $project->id);

		$projectLaborCosts = ProjectLaborCost::saveLabors($command->labors, $project->id);

		$projectLogisticsCosts = ProjectLogisticsCost::saveLogistics($command->logistics, $project->id);

		//broadcast an event for newproject
		//to create notifications for accountant
		$this->dispatchEventsFor($project);

	}
}
<?php

use Acme\Facades\CartMaterials;
use Acme\Facades\ProjectService;
use Acme\Forms\ConfirmProjectForm;
use Acme\Forms\NewProjectForm;
use Acme\Helpers\ViewDataHelper;
use Acme\LaborCosts\UtilityCostRepository;
use Acme\Projects\NewProjectCommand;
use Acme\Projects\ProjectRepository;
use Carbon\Carbon;
use Laracasts\Flash\Flash;

class ProjectsController extends \BaseController {

	private $repository;

	private $utilityCostRepository;

	private $newProjectForm;

	private $confirmProjectForm;

	function __construct(ProjectRepository $repository,
						 UtilityCostRepository $utilityCostRepository,
						 NewProjectForm $newProjectForm,
						 ConfirmProjectForm $confirmProjectForm)
	{
		$this->repository = $repository;
		$this->utilityCostRepository = $utilityCostRepository;
		$this->newProjectForm = $newProjectForm;
		$this->confirmProjectForm = $confirmProjectForm;
	}

	/**
	 * Display a listing of the resource.
	 * GET /projects
	 *
	 * @return Response
	 */
	public function index()
	{
		$viewData = ViewDataHelper::createViewHeaderData('Projects', '', 'Manage Projects', 'fa fa-exchange');

		$viewData = array_merge($viewData, [
			'data'    => $this->repository->getTableData(),
			'columns' => $this->repository->getTableColumns()
		]);

		return View::make('projects.index', $viewData);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /projects/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$currentPage = [
			'Projects' => [
				'url' => URL::route('projects_index_path')
			],
			'New Project' => [
				'isCurrentPage' => true
			]
		];

		$viewData = ViewDataHelper::createViewHeaderData('Projects', 'New Project', $currentPage, 'fa fa-exchange');

		$viewData = array_merge($viewData, [
			'laborTypes'    => $this->utilityCostRepository->getLaborTypes(),
			'logisticsType' => $this->utilityCostRepository->getLogisticsTypes()
		]);

		return View::make('projects.create', $viewData);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /projects
	 *
	 * @return Response
	 */
	public function store()
	{
		try {
			$inputs['client'] = ProjectService::getClientId();
			$inputs['salesrep'] = ProjectService::getSalesRepId();
			$inputs['estimator'] = ProjectService::getEstimatorId();
			$inputs['name'] = ProjectService::getName();
			$inputs['location'] = ProjectService::getLocation();
			$inputs['leadTime'] = ProjectService::getLeadTime();
			$inputs['deadline'] = ProjectService::getDeadlineValue();
			$inputs['currentDate'] = is_null(ProjectService::getCurrentDateValue())
				? Carbon::parse(Input::get('currentDate'))->format('Y-m-d')
				: ProjectService::getCurrentDateValue();

			$inputs['items'] = array_merge(CartMaterials::getOrdinaryMaterials(true), CartMaterials::getStandardMaterials(true));
			$inputs['labors'] = CartMaterials::getLabors(true);
			$inputs['logistics'] = CartMaterials::getLogistics(true);

			$inputs['sub_total_cost'] = CartMaterials::getTotalCost(false);
			$inputs['contingencies'] = Config::get('constants.CONTINGENCIES');
			$inputs['standard_materials_cost'] = CartMaterials::getStandardTotalCost();
			$inputs['cost_multiplier'] = Input::get('costMultiplier');
			$inputs['vat_rate'] = isset(GeneralSetting::first()->vat_rate)
				? GeneralSetting::first()->vat_rate
				: Config::get('constants.DEFAULT_TAX_RATE');

			$this->newProjectForm->validate($inputs);

			$this->execute(NewProjectCommand::class, $inputs);

			$success = [
				'title' => 'New Project',
				'message' => 'Successfully Created New Project.',
				'redirectTo' => URL::route('projects_index_path')
			];

			return Response::json($success);

		} catch (Laracasts\Validation\FormValidationException $exception) {

			$errors = DataHelper::getErrorDataFromException($exception);

			return Response::json($errors, 400);
		}
	}

	public function getConfirm($projectname)
	{
		if(Auth::user()->id != $projectname->salesrep_id) return Redirect::route('dashboard');

		$currentPage = [
			'Projects' => [
				'url' => URL::route('projects_index_path')
			],
			'Confirm Project' => [
				'isCurrentPage' => true
			]
		];

		$viewData = ViewDataHelper::createViewHeaderData('Projects', 'Confirm Project', $currentPage, 'fa fa-question-circle');

		$viewData['project'] = $projectname;
		$viewData['projectItems'] = $projectname->ordinaryMaterials();
		$viewData['standardMaterials'] = $projectname->standardMaterials();
		$viewData['projectLabors'] = $projectname->laborcosts();
		$viewData['projectLogistics'] = $projectname->logisticscosts();

		$projectGenCost = $projectname->generatedCost;

		$viewData['contingencies'] = $projectGenCost->contingencies;
		$viewData['contingenciesAmount'] = ($projectGenCost->contingencies / 10) * $projectGenCost->sub_total_cost;
		$viewData['subTotalCost'] = $projectGenCost->sub_total_cost - $viewData['contingenciesAmount'];
		$viewData['totalCost'] = $projectGenCost->sub_total_cost;
		$viewData['standardMaterialsCost'] = $projectGenCost->standard_materials_cost;

		$viewData['costMultiplier'] = $projectGenCost->cost_multiplier;
		$viewData['grandTotalCost'] = (($projectGenCost->sub_total_cost * $projectGenCost->cost_multiplier) + $projectGenCost->standard_materials_cost) * ($projectGenCost->vat_rate / 100);

		return View::make('projects.confirm-project', $viewData);
	}

	public function postConfirm()
	{
		Log::info(Input::all());

		// Confirm User to confirm if match on the accountant id of project
		$this->confirmProjectForm->validate(Input::get('proj_id'));

		$project = Project::find(Input::get('proj_id'));

		if(Auth::user()->id != $project->salesrep_id) return Redirect::route('dashboard');

		$project->is_approved = 1;

		Flash::success('Project Successfully Approved.');

		return Redirect::route('projects_index_path');
	}

	/**
	 * Display the specified resource.
	 * GET /projects/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /projects/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /projects/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /projects/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
<?php

use Acme\Forms\NewLogisticsCostForm;
use Acme\Forms\UpdateLogisticsCostForm;
use Acme\Helpers\ViewDataHelper;
use Acme\LaborCosts\UtilityCostRepository;
use Acme\LogisticsCosts\NewLogisticsCostCommand;
use Acme\LogisticsCosts\UpdateLogisticsCostCommand;
use Laracasts\Flash\Flash;

class LogisticsCostsController extends \BaseController {

	private $repository;

	private $newLogisticsCostForm;

	private $updateLogisticsCostForm;

	function __construct(UtilityCostRepository $repository,
						 NewLogisticsCostForm $newLogisticsCostForm,
						 UpdateLogisticsCostForm $updateLogisticsCostForm)
	{
		$this->repository = $repository;
		$this->newLogisticsCostForm = $newLogisticsCostForm;
		$this->updateLogisticsCostForm = $updateLogisticsCostForm;
	}


	/**
	 * Display a listing of the resource.
	 * GET /logisticscosts
	 *
	 * @return Response
	 */
	public function index()
	{
		$viewData = ViewDataHelper::createViewHeaderData('Logistics Costs', '', 'Manage Logistics Costs', 'fa fa-truck');

		$viewData = array_merge($viewData, [
			'data' => $this->repository->getLogisticsCostTableData(),
			'columns' => $this->repository->getTableColumns()
		]);

		return View::make('logistics_costs.index', $viewData);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /logisticscosts/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$currentPage = [
			'Projects' => [
				'url' => URL::route('projects_index_path')
			],
			'Logistics Costs' => [
				'url' => URL::route('labor_costs_index_path')
			],
			'New Logistics Cost' => [
				'isCurrentPage' => true
			]
		];

		$viewData = ViewDataHelper::createViewHeaderData('Logistics Costs', 'New Logistics Cost', $currentPage, 'fa fa-wrench');

		return View::make('logistics_costs.create', $viewData);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /logisticscosts
	 *
	 * @return Response
	 */
	public function store()
	{
		$this->newLogisticsCostForm->validate(Input::all());

		$this->execute(NewLogisticsCostCommand::class);

		Flash::success('Successfully Added Logistics Cost.');

		return Redirect::route('logistics_costs_index_path');
	}

	/**
	 * Display the specified resource.
	 * GET /logisticscosts/{id}
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
	 * GET /logisticscosts/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($utilitycost)
	{
		$currentPage = [
			'Projects' => [
				'url' => URL::route('projects_index_path')
			],
			'Logistics Costs' => [
				'url' => URL::route('logistics_costs_index_path')
			],
			'Update Logistics Cost' => [
				'isCurrentPage' => true
			]
		];

		$viewData = ViewDataHelper::createViewHeaderData('Logistics Costs', 'Update Logistics Cost', $currentPage, 'fa fa-truck');

		$viewData['logisticscost'] = $utilitycost;

		return View::make('logistics_costs.edit', $viewData);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /logisticscosts/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$inputs = Input::all();

		$inputs['id'] = $id;

		$this->updateLogisticsCostForm->validate($inputs);

		$this->execute(UpdateLogisticsCostCommand::class, $inputs);

		Flash::success('Successfully Updated Logistics Cost.');

		return Redirect::route('logistics_costs_index_path');
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /logisticscosts/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($utilitycost)
	{
		$utilitycost->delete();

		return Response::json();
	}

}
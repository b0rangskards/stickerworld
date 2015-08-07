<?php

use Acme\Forms\NewLaborCostForm;
use Acme\Forms\UpdateLaborCostForm;
use Acme\Helpers\ViewDataHelper;
use Acme\LaborCosts\NewLaborCostCommand;
use Acme\LaborCosts\UpdateLaborCostCommand;
use Acme\LaborCosts\UtilityCostRepository;

class LaborCostsController extends \BaseController {

	private $repository;

	private $newLaborCostForm;

	private $updateLaborCostForm;

	function __construct(UtilityCostRepository $repository,
						 NewLaborCostForm $newLaborCostForm,
						 UpdateLaborCostForm $updateLaborCostForm)
	{
		$this->repository = $repository;

		$this->newLaborCostForm = $newLaborCostForm;

		$this->updateLaborCostForm = $updateLaborCostForm;
	}


	/**
	 * Display a listing of the resource.
	 * GET /laborcosts
	 *
	 * @return Response
	 */
	public function index()
	{
		$viewData = ViewDataHelper::createViewHeaderData('Labor Costs', '', 'Manage Labor Costs', 'fa fa-wrench');

		$viewData = array_merge($viewData, [
			'data' => $this->repository->getLaborCostTableData(),
			'columns' => $this->repository->getTableColumns()
		]);

		return View::make('labor_costs.index', $viewData);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /laborcosts/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$currentPage = [
			'Projects' => [
				'url' => URL::route('projects_index_path')
			],
			'Labor Costs' => [
				'url' => URL::route('labor_costs_index_path')
			],
			'New Labor Cost' => [
				'isCurrentPage' => true
			]
		];

		$viewData = ViewDataHelper::createViewHeaderData('Labor Costs', 'New Labor Cost', $currentPage, 'fa fa-wrench');

		return View::make('labor_costs.create', $viewData);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /laborcosts
	 *
	 * @return Response
	 */
	public function store()
	{
		$this->newLaborCostForm->validate(Input::all());

		$this->execute(NewLaborCostCommand::class);

		Flash::success('Successfully Added Labor Cost.');

		return Redirect::route('labor_costs_index_path');
	}

	/**
	 * Display the specified resource.
	 * GET /laborcosts/{id}
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
	 * GET /laborcosts/{id}/edit
	 *
	 * @param $utilitycost
	 * @return Response
	 */
	public function edit($utilitycost)
	{
		$currentPage = [
			'Projects' => [
				'url' => URL::route('projects_index_path')
			],
			'Labor Costs' => [
				'url' => URL::route('labor_costs_index_path')
			],
			'Update Labor Cost' => [
				'isCurrentPage' => true
			]
		];

		$viewData = ViewDataHelper::createViewHeaderData('Labor Costs', 'Update Labor Cost', $currentPage, 'fa fa-wrench');

		$viewData['laborcost'] = $utilitycost;

		return View::make('labor_costs.edit', $viewData);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /laborcosts/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$inputs = Input::all();

		$inputs['id'] = $id;

		$this->updateLaborCostForm->validate($inputs);

		$this->execute(UpdateLaborCostCommand::class, $inputs);

		Flash::success('Successfully Updated Labor Cost.');

		return Redirect::route('labor_costs_index_path');
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /laborcosts/{id}
	 *
	 * @param $laborcost
	 * @return Response
	 */
	public function destroy($utilitycost)
	{
		$utilitycost->delete();

		return Response::json();
	}

}
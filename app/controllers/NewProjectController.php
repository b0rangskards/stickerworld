<?php

use Acme\Facades\CartMaterials;
use Acme\Forms\AddLaborCostFromProjectForm;
use Acme\Forms\AddLogisticsCostFromProjectForm;
use Acme\Forms\AddMaterialForm;
use Acme\Forms\NewProjectHeaderFieldsForm;
use Acme\Forms\UpdateLogisticsQuantityForm;
use Acme\Forms\UpdateUtilityQuantityForm;
use Acme\Helpers\DataHelper;
use Acme\Helpers\ProjectHelper;
use Acme\LaborCosts\UtilityCostRepository;
use Acme\Projects\AddLaborCostFromProjectCommand;
use Acme\Projects\AddLogisticsCostFromProjectCommand;
use Acme\Projects\AddMaterialCommand;
use Acme\Projects\ProjectRepository;
use Acme\Projects\StoreNewProjectToSessionCommand;
use Acme\Projects\UpdateLogisticsQuantityCommand;
use Acme\Projects\UpdateMaterialQuantityCommand;
use Acme\Projects\UpdateUtilityQuantityCommand;
use Illuminate\Http\Response as ResponseIlluminate;
use Cart as MyCart;

class NewProjectController extends \BaseController {

	private $repository;

	private $newProjectHeaderFieldsForm;

	private $utilityCostRepository;

	private $addMaterialForm;

	private $addLaborCostFromProjectForm;

	private $updateUtilityQuantityForm;

	private $addLogisticsCostFromProjectForm;

	private $updateLogisticsQuantityForm;

	function __construct(ProjectRepository $repository,
	                     UtilityCostRepository $utilityCostRepository,
	                     NewProjectHeaderFieldsForm $newProjectHeaderFieldsForm,
	                     AddMaterialForm $addMaterialForm,
	                     AddLaborCostFromProjectForm $addLaborCostFromProjectForm,
	                     UpdateUtilityQuantityForm $updateUtilityQuantityForm,
	                     AddLogisticsCostFromProjectForm $addLogisticsCostFromProjectForm,
	                     UpdateLogisticsQuantityForm $updateLogisticsQuantityForm)
	{
		$this->repository = $repository;

		$this->utilityCostRepository = $utilityCostRepository;

		$this->newProjectHeaderFieldsForm = $newProjectHeaderFieldsForm;

		/* Form Validators */

		$this->addMaterialForm = $addMaterialForm;

		$this->addLaborCostFromProjectForm = $addLaborCostFromProjectForm;

		$this->updateUtilityQuantityForm = $updateUtilityQuantityForm;
		$this->addLogisticsCostFromProjectForm = $addLogisticsCostFromProjectForm;
		$this->updateLogisticsQuantityForm = $updateLogisticsQuantityForm;
	}

	public function validate()
	{
		try {
			Log::info(Request::all());

			$this->newProjectHeaderFieldsForm->validate(Request::all());

			$this->execute(StoreNewProjectToSessionCommand::class);

			return Response::json([], 200);

		} catch ( Laracasts\Validation\FormValidationException $exception )
		{
			$errors = DataHelper::getErrorDataFromException($exception);

			return Response::json($errors, ResponseIlluminate::HTTP_BAD_REQUEST);
		}
	}

	public function addMaterial()
	{
		try {
			$this->addMaterialForm->validate(Input::all());

			$this->execute(AddMaterialCommand::class);

			return Response::json([], 200);

		} catch ( Laracasts\Validation\FormValidationException $exception )
		{
			$errors = DataHelper::getErrorDataFromException($exception);

			return Response::json($errors, ResponseIlluminate::HTTP_BAD_REQUEST);
		}
	}

	public function addLaborCost()
	{
		try {
			$this->addLaborCostFromProjectForm->validate(Input::all());

			$this->execute(AddLaborCostFromProjectCommand::class);

			return Response::json([], 200);

		} catch ( Laracasts\Validation\FormValidationException $exception ) {

			$errors = DataHelper::getErrorDataFromException($exception);

			return Response::json($errors, ResponseIlluminate::HTTP_BAD_REQUEST);
		}
	}

	public function addLogisticsCost()
	{
		try {
			$this->addLogisticsCostFromProjectForm->validate(Input::all());

			$this->execute(AddLogisticsCostFromProjectCommand::class);

			return Response::json();

		} catch ( Laracasts\Validation\FormValidationException $exception ) {

			$errors = DataHelper::getErrorDataFromException($exception);

			return Response::json($errors, ResponseIlluminate::HTTP_BAD_REQUEST);
		}
	}

	public function updateMaterialQuantity()
	{
		try {
			$this->addMaterialForm->validate(Input::all());

			$this->execute(UpdateMaterialQuantityCommand::class);

			$total = CartMaterials::getItemLineTotal(Input::get('item_id'));

			return Response::json([
				'line_total' => $total,
				'sub_total'  => number_format(CartMaterials::getTotalCost(false), 2),
				'contingencies' => number_format(CartMaterials::getTotalCost() - CartMaterials::getTotalCost(false), 2),
				'total_cost' => number_format(CartMaterials::getTotalCost(), 2),
				'standard_cost' => number_format(CartMaterials::getStandardTotalCost(), 2)
			]);

		} catch ( Laracasts\Validation\FormValidationException $exception ) {

			$errors = DataHelper::getErrorDataFromException($exception);

			return Response::json($errors, ResponseIlluminate::HTTP_BAD_REQUEST);
		}
	}

	public function updateUtilityQuantity()
	{
		try {
			$this->updateUtilityQuantityForm->validate(Input::all());

			$this->execute(UpdateUtilityQuantityCommand::class);

			$total = CartMaterials::getItemLineTotal(Input::get('id'));

			return Response::json([
				'line_total' => $total,
				'sub_total' => number_format(CartMaterials::getTotalCost(false), 2),
				'contingencies' => number_format(CartMaterials::getTotalCost() - CartMaterials::getTotalCost(false), 2),
				'total_cost' => number_format(CartMaterials::getTotalCost(), 2),
				'standard_cost' => number_format(CartMaterials::getStandardTotalCost(), 2)
			], 200);

		} catch ( Laracasts\Validation\FormValidationException $exception ) {

			$errors = DataHelper::getErrorDataFromException($exception);

			return Response::json($errors, ResponseIlluminate::HTTP_BAD_REQUEST);
		}
	}

	public function updateLogisticsQuantity()
	{
		try {
			$this->updateLogisticsQuantityForm->validate(Input::all());

			$this->execute(UpdateLogisticsQuantityCommand::class);

			$total = CartMaterials::getItemLineTotal(Input::get('id'));

			return Response::json([
				'line_total' => $total,
				'sub_total' => number_format(CartMaterials::getTotalCost(false), 2),
				'contingencies' => number_format(CartMaterials::getTotalCost() - CartMaterials::getTotalCost(false), 2),
				'total_cost' => number_format(CartMaterials::getTotalCost(), 2),
				'standard_cost' => number_format(CartMaterials::getStandardTotalCost(), 2)
			], 200);

		} catch ( Laracasts\Validation\FormValidationException $exception ) {

			$errors = DataHelper::getErrorDataFromException($exception);

			return Response::json($errors, ResponseIlluminate::HTTP_BAD_REQUEST);
		}
	}

	public function generateCostEstimationSection()
	{
		$costEstimates = CartMaterials::generateCostEstimatesFromCart();

		$data = [
			'view' => View::make('projects.partials._cost-estimation-section')
			->with('costEstimates', $costEstimates)
			->render()
		];

		return Response::json($data, 200);
	}

	public function cancelMaterial($itemId)
	{
		$this->repository->cancelMaterial($itemId);
	}

}
<?php

use Acme\Forms\AddNewItemForm;
use Acme\Forms\UpdateItemForm;
use Acme\Helpers\DataHelper;
use Acme\Helpers\ViewDataHelper;
use Acme\Items\ItemRepository;
use Acme\Items\NewItemCommand;
use Acme\Items\UpdateItemCommand;
use Laracasts\Flash\Flash;

class ItemsController extends \BaseController {

	private $repository;

	private $newItemForm;

	private $updateItemForm;

	function __construct(ItemRepository $repository, AddNewItemForm $newItemForm, UpdateItemForm $updateItemForm)
	{
		$this->repository = $repository;

		$this->newItemForm = $newItemForm;

		$this->updateItemForm = $updateItemForm;
	}

	public function search()
	{
		$query = Input::get('query');
		$is_sm = intval(Input::get('is_sm'));

		if(isset(Auth::user()->employee->br_id))
		{
			$branchId = Auth::user()->employee->br_id;

			return Item::with('supplier')
				->whereHas('supplier', function($q) use($branchId) {
					$q->where('br_id', $branchId);
				})
				->search($query)
				->where('is_sm', $is_sm)
				->get();
		}

		return Item::with('supplier')
			->search($query)
			->where('is_sm', $is_sm)
			->get();
	}

	public function fetchData($id)
	{
		$item = Item::findOrFail($id);

		return Response::json(['obj' => $item->toArray()]);
	}

	/**
	 * Display a listing of the resource.
	 * GET /items
	 *
	 * @return Response
	 */
	public function index()
	{
		$viewData = ViewDataHelper::createViewHeaderData('Items', '', 'Manage Items', 'fa fa-cube');

		$viewData = array_merge($viewData, [
			'data' => $this->repository->getTableData(),
			'columns' => $this->repository->getTableColumns()
		]);

		return View::make('items.index', $viewData);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /items/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$currentPage = [
			'Items' => [
				'url' => URL::route('items_index_path')
			],
			'New Item' => [
				'isCurrentPage' => true
			]
		];

		$viewData = ViewDataHelper::createViewHeaderData('Items', 'New Item', $currentPage, 'fa fa-cube');

		$suppliers = !is_null(Auth::user()->employee)
					? Supplier::where('br_id', Auth::user()->employee->br_id)->lists('name', 'id')
					: Supplier::all()->lists('name', 'id');

		$viewData = array_merge($viewData, [
			'suppliers'      => $suppliers,
			'itemTypes'      => Config::get('enums.item_type'),
			'unitOfMeasures' => Config::get('enums.unit_of_measure')
		]);

		return View::make('items.create', $viewData);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /items
	 *
	 * @return Response
	 */
	public function store($supplierId)
	{
		try
		{
			$inputs = Input::all();

			$inputs['is_sm'] = isset($inputs['is_sm']) ? : '';

			$inputs['supplier_id'] = $supplierId;

			$this->newItemForm->validate($inputs);

			$this->execute(NewItemCommand::class, $inputs);

			$message = [
				'message' => 'Successfully Added Item.',
				'redirectTo' => URL::route('show_supplier_path', $supplierId)
			];

			return Response::json($message);

		} catch ( Laracasts\Validation\FormValidationException $exception ) {

			$errors = DataHelper::getErrorDataFromException($exception);

			if ( Request::ajax() ) return Response::json($errors, 400);

			return Redirect::back()->withInput()->withErrors($errors);
		}
	}

	public function newItem()
	{
		try
		{
			$inputs = Input::all();

			$inputs['is_sm'] = isset($inputs['is_sm'])?:'';

			$this->newItemForm->validate($inputs);

			$this->execute(NewItemCommand::class, $inputs);

			Flash::message('Successfully Added Item.');

			return Redirect::route('items_index_path');

		} catch ( Laracasts\Validation\FormValidationException $exception ) {

			$errors = DataHelper::getErrorDataFromException($exception);

			return Redirect::back()->withInput()->withErrors($errors);
		}
	}

	/**
	 * Display the specified resource.
	 * GET /items/{id}
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
	 * GET /items/{id}/edit
	 *
	 * @param $item
	 * @return Response
	 */
	public function edit($item)
	{
		$currentPage = [
			'Items' => [
				'url' => URL::route('items_index_path')
			],
			'Update Item' => [
				'isCurrentPage' => true
			]
		];

		$viewData = ViewDataHelper::createViewHeaderData('Items', 'Update Item', $currentPage, 'fa fa-cube');

		$suppliers = !is_null(Auth::user()->employee)
			? Supplier::where('br_id', Auth::user()->employee->br_id)->lists('name', 'id')
			: Supplier::all()->lists('name', 'id');


		$viewData = array_merge($viewData, [
			'item'      => $item,
			'suppliers' => $suppliers,
			'itemTypes' => Config::get('enums.item_type'),
			'unitOfMeasures' => Config::get('enums.unit_of_measure')
		]);


		return View::make('items.edit', $viewData);
	}

	public function updateItem()
	{
		try
		{
			$this->updateItemForm->validate(Input::all());

			$this->execute(UpdateItemCommand::class);

			Flash::message('Successfully Updated Item.');

			return Redirect::route('items_index_path');

		} catch ( Laracasts\Validation\FormValidationException $exception ) {

			$errors = DataHelper::getErrorDataFromException($exception);

			if ( Request::ajax() ) return Response::json($errors, 400);

			return Redirect::back()->withInput()->withErrors($errors);
		}
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /items/{id}
	 *
	 * @param $supplierId
	 * @return Response
	 */
	public function update($supplierId)
	{
		try {
			$inputs = Input::all();

			$inputs['supplier_id'] = $supplierId;

			$this->updateItemForm->validate($inputs);

			$this->execute(UpdateItemCommand::class);

			$message = [
				'message' => 'Successfully Updated Item.',
				'redirectTo' => URL::route('show_supplier_path', $supplierId)
			];

			return Response::json($message);

		} catch ( Laracasts\Validation\FormValidationException $exception ) {

			$errors = DataHelper::getErrorDataFromException($exception);

			if ( Request::ajax() ) return Response::json($errors, 400);

			return Redirect::back()->withInput()->withErrors($errors);
		}
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /items/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$item = Item::findOrFail($id);

		$item->delete();
	}

}
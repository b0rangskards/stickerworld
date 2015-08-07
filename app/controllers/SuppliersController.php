<?php

use Acme\Forms\CancelSupplierForm;
use Acme\Forms\NewSupplierForm;
use Acme\Forms\UpdateSupplierForm;
use Acme\Helpers\DataHelper;
use Acme\Helpers\ViewDataHelper;
use Acme\Items\ItemRepository;
use Acme\Suppliers\CancelSupplierCommand;
use Acme\Suppliers\NewSupplierCommand;
use Acme\Suppliers\SupplierRepository;
use Acme\Suppliers\UpdateSupplierCommand;

class SuppliersController extends \BaseController {

    protected $repository;

    protected $newSupplierForm;

    protected $updateSupplierForm;

    protected $cancelSupplierForm;

	protected $itemRepository;

    function __construct(SupplierRepository $repository,
	                     ItemRepository $itemRepository,
                         NewSupplierForm $newSupplierForm,
                         UpdateSupplierForm $updateSupplierForm,
                         CancelSupplierForm $cancelSupplierForm)
    {
        $this->repository = $repository;

        $this->newSupplierForm = $newSupplierForm;

        $this->updateSupplierForm = $updateSupplierForm;

        $this->cancelSupplierForm = $cancelSupplierForm;

	    $this->itemRepository = $itemRepository;
    }

    /**
	 * Display a listing of the resource.
	 * GET /suppliers
	 *
	 * @return Response
	 */
	public function index()
	{
        $viewData = ViewDataHelper::createViewHeaderData('Suppliers', '', 'Manage Suppliers', 'fa fa-truck');

        $viewData = array_merge($viewData, [
            'data' => $this->repository->getTableData(),
            'columns' => $this->repository->getTableColumns()
        ]);

        return View::make('suppliers.index', $viewData);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /suppliers/create
	 *
	 * @return Response
	 */
	public function create()
	{
        $currentPage = [
            'Suppliers' => [
                'url' => URL::route('suppliers_index_path')
            ],
            'New Supplier' => [
                'isCurrentPage' => true
            ]
        ];

        $viewData = ViewDataHelper::createViewHeaderData('Suppliers', 'New Supplier', $currentPage, 'fa fa-truck');

        $viewData = array_merge($viewData, [
            'supplierTypes' => Config::get('enums.supplier_type'),
            'contactTypes'  => Config::get('enums.contact_type')
        ]);

        return View::make('suppliers.create', $viewData);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /suppliers
	 *
	 * @return Response
	 */
	public function store()
	{
        try
        {
            $this->newSupplierForm->validate(Input::all());

            $this->execute(NewSupplierCommand::class);

            Flash::success('Successfully Added Supplier.');

            return Redirect::route('suppliers_index_path');

        } catch ( Laracasts\Validation\FormValidationException $exception ) {

            $errors = DataHelper::getErrorDataFromException($exception);

            if ( Request::ajax() ) return Response::json($errors, 400);

            return Redirect::back()->withInput()->withErrors($errors);
        }
	}

	/**
	 * Display the specified resource.
	 * GET /suppliers/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$currentSupplier = Supplier::findOrFail($id);

		$currentPage = [
			'Suppliers' => [
				'url' => URL::route('suppliers_index_path')
			],
			$currentSupplier->present()->prettyName => [
				'isCurrentPage' => true
			]
		];

		$viewData = ViewDataHelper::createViewHeaderData('Suppliers', $currentSupplier->present()->prettyName, $currentPage, 'fa fa-truck');

		$viewData = array_merge($viewData, [
			'supplier'  => $currentSupplier,
			'items' => $this->itemRepository->getTableDataForSuppliersTable($currentSupplier->id),
			'itemTypes' => Config::get('enums.item_type'),
			'unitOfMeasures' => Config::get('enums.unit_of_measure'),
			'itemColumns' => $this->itemRepository->getTableColumnsForSuppliersTable(),
			'standardMaterials' => $this->itemRepository->getTableDataForSuppliersTable($currentSupplier->id, true)
		]);

		return View::make('suppliers.show', $viewData);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /suppliers/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $currentSupplier = Supplier::findOrFail($id);

        $currentPage = [
            'Suppliers' => [
                'url' => URL::route('suppliers_index_path')
            ],
            'Update Supplier' => [
                'isCurrentPage' => true
            ]
        ];

        $viewData = ViewDataHelper::createViewHeaderData('Suppliers', 'Update Supplier', $currentPage, 'fa fa-truck');

        $viewData = array_merge($viewData, [
            'supplierTypes'   => Config::get('enums.supplier_type'),
            'contactTypes'    => Config::get('enums.contact_type'),
            'currentSupplier' => $currentSupplier
        ]);

        return View::make('suppliers.edit', $viewData);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        try {
            $inputs = Input::all();

            $inputs['supplier_id'] = $id;

            $this->updateSupplierForm->validate($inputs);

            $this->execute(UpdateSupplierCommand::class, $inputs);

            $message = 'Successfully Updated Supplier Information.';

            Flash::success($message);

            return Redirect::route('suppliers_index_path');

        } catch ( Laracasts\Validation\FormValidationException $exception ) {

            $errors = DataHelper::getErrorDataFromException($exception);

            if ( !is_object($exception->getErrors()) ) {
                Flash::error(DataHelper::arrayToString($errors));

                return Redirect::back()->withInput();
            }

            if ( Request::ajax() ) return Response::json($errors, 400);

            return Redirect::back()->withInput()->withErrors($errors);
        }
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /suppliers/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        try
        {
            $input['id'] = $id;

            $this->cancelSupplierForm->validate($input);

            $this->execute(CancelSupplierCommand::class, $input);

            $success = ['title' => 'Success', 'message' => 'Successfully closed branch.'];

            return Response::json($success);

        } catch ( Laracasts\Validation\FormValidationException $exception ) {

            $errors = $exception->getErrors()->toArray();

            return Response::json($errors, 400);
        }
	}

}
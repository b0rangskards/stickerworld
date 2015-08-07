<?php

use Acme\Clients\ClientRepository;
use Acme\Clients\NewClientCommand;
use Acme\Clients\UpdateClientCommand;
use Acme\Forms\NewClientForm;
use Acme\Forms\UpdateClientForm;
use Acme\Helpers\ViewDataHelper;
use Laracasts\Flash\Flash;

class ClientsController extends \BaseController {

	private $repository;

	private $newClientForm;

	private $updateClientForm;

	function __construct(ClientRepository $repository,
	                     NewClientForm $newClientForm,
	                     UpdateClientForm $updateClientForm)
	{
		$this->repository = $repository;

		$this->newClientForm = $newClientForm;

		$this->updateClientForm = $updateClientForm;
	}


	/**
	 * Display a listing of the resource.
	 * GET /clients
	 *
	 * @return Response
	 */
	public function index()
	{
		$viewData = ViewDataHelper::createViewHeaderData('Clients', '', 'Manage Clients', 'fa fa-male');

		$viewData = array_merge($viewData, [
			'data' => $this->repository->getTableData(),
			'columns' => $this->repository->getTableColumns()
		]);

		return View::make('clients.index', $viewData);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /clients/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$currentPage = [
			'Clients' => [
				'url' => URL::route('clients_index_path')
			],
			'New Client' => [
				'isCurrentPage' => true
			]
		];

		$viewData = ViewDataHelper::createViewHeaderData('Clients', 'New Client', $currentPage, 'fa fa-male');

		return View::make('clients.create', $viewData);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /clients
	 *
	 * @return Response
	 */
	public function store()
	{
		if(is_null(Auth::user()->employee))
		{
			Flash::error('User Not Associated with any Branch.');

			return Redirect::back()->withInput();
		}

		$formData = Input::all();

		$formData['br_id'] = Auth::user()->employee->br_id;

		$this->newClientForm->validate($formData);

		$this->execute(NewClientCommand::class, $formData);

		Flash::message('Successfully Added Client.');

		return Redirect::route('clients_index_path');
	}

	/**
	 * Display the specified resource.
	 * GET /clients/{id}
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
	 * GET /clients/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($client)
	{
		$currentPage = [
			'Clients' => [
				'url' => URL::route('clients_index_path')
			],
			'Update Client' => [
				'isCurrentPage' => true
			]
		];

		$viewData = ViewDataHelper::createViewHeaderData('Clients', 'Update Client', $currentPage, 'fa fa-male');

		$viewData['client'] = $client;

		return View::make('clients.edit', $viewData);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /clients/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$this->updateClientForm->validate(Input::all());

		$this->execute(UpdateClientCommand::class);

		Flash::message('Successfully Updated Client.');

		return Redirect::route('clients_index_path');
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /clients/{id}
	 *
	 * @param $client
	 * @return Response
	 */
	public function destroy($client)
	{
		$client->delete();

		return Response::json(['message' => 'Successfully Deleted Client'], 200);
	}

	public function fetchData()
	{
		$query = Request::get('query');

		$clients = $this->repository->getClientData($query, Auth::user());

		return Response::json($clients, 200);
	}

}
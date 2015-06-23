<?php

use Acme\Employees\EmployeeRepository;

class EmployeesController extends \BaseController {

    private $employeeRepository;

    function __construct(EmployeeRepository $employeeRepository)
    {
        $this->employeeRepository = $employeeRepository;
    }

    /**
	 * Display a listing of the resource.
	 * GET /employeescontrollr
	 *
	 * @return Response
	 */
	public function index()
	{
        $data['headerTitle'] = 'Employees';
        $data['subTitle'] = 'Management';
        $data['currentPage'] = 'Manage Employees';

        $data['data'] = $this->employeeRepository->getTableData();
        $data['columns'] = $this->employeeRepository->getTableColumns();

        return View::make('employees.index', $data);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /employeescontrollr/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /employeescontrollr
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /employeescontrollr/{id}
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
	 * GET /employeescontrollr/{id}/edit
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
	 * PUT /employeescontrollr/{id}
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
	 * DELETE /employeescontrollr/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
<?php

use Acme\Employees\EmployeeRepository;
use Acme\Employees\HireNewEmployeeCommand;
use Acme\Employees\TerminateEmployeeCommand;
use Acme\Forms\HireNewEmployeeForm;
use Acme\Forms\TerminateEmployeeForm;
use Acme\Forms\UpdateEmployeeForm;
use Acme\Helpers\DataHelper;
use Acme\Helpers\ViewDataHelper;

class EmployeesController extends \BaseController {

    protected $employeeRepository;

    protected $hireNewEmployeeForm;

    protected $terminateEmployeeForm;

    protected $updateEmployeeForm;

    function __construct(EmployeeRepository $employeeRepository,
                         HireNewEmployeeForm $hireNewEmployeeForm,
                         TerminateEmployeeForm $terminateEmployeeForm,
                         UpdateEmployeeForm $updateEmployeeForm)
    {
        $this->employeeRepository = $employeeRepository;

        $this->hireNewEmployeeForm = $hireNewEmployeeForm;

        $this->terminateEmployeeForm = $terminateEmployeeForm;
    }

    /**
	 * Display a listing of the resource.
	 * GET /employee
	 *
	 * @return Response
	 */
	public function index()
	{
        $viewData = ViewDataHelper::createViewHeaderData('Employees', '', 'Manage Employees', 'fa fa-male');

        $viewData = array_merge($viewData, [
           'data'       => $this->employeeRepository->getTableData(),
           'columns'    => $this->employeeRepository->getTableColumns()
        ]);

        return View::make('employees.index', $viewData);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /employee/create
	 *
	 * @return Response
	 */
	public function create()
	{
        $currentPage = [
            'Employees' => [
                'url' => URL::route('employees_index_path')
            ],
            'Hire Employee' => [
                'isCurrentPage' => true
            ]
        ];

        $viewData = ViewDataHelper::createViewHeaderData('Employees', 'Hire Employee', $currentPage, 'fa fa-male');

        $viewData = array_merge($viewData, [
           // Data for select options
           'genders'        => ['male' => 'Male', 'female' => 'Female'],
           'departments'    => Department::getDataForSelect()
        ]);

        // if user is admin or moderator
        // user must select branch and
        // user can create roles from manager to lower level
        if(Auth::user()->isAdminModerator()) {
            $viewData['branches'] = Branch::getDataForSelect();
            $viewData['roles'] = Role::getDataForSelect(['admin', 'moderator']);
        } else {
            $viewData['roles'] = Role::getDataForSelect(['admin', 'moderator', 'manager']);
        }

        return View::make('employees.create', $viewData);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /employee
	 *
	 * @return Response
	 */
	public function store()
	{
        try {
            $this->hireNewEmployeeForm->validate(Input::all());

            $this->execute(HireNewEmployeeCommand::class);

            $userActivationPromptMessage = !empty(Input::get('email')) ? 'An Email was sent to the Employee for account activation' : '';

            Flash::success('Successfully Hired Employee. ' . $userActivationPromptMessage);

            return Redirect::route('employees_index_path');

        } catch ( Laracasts\Validation\FormValidationException $exception ) {

            $errors = DataHelper::getErrorDataFromException($exception);

            Flash::error(DataHelper::arrayToString($errors));

            if(Request::ajax()) return Response::json($errors, 400);

            return Redirect::back()->withInput();
	    }
    }

    public function show($id)
    {
        $currentPage = [
          'Employees'   =>  [
              'url' =>  URL::route('employees_index_path')
          ],
          'Employee Information'    =>  [
              'isCurrentPage'   =>  true
          ]
        ];

        $viewData = ViewDataHelper::createViewHeaderData('Employee', 'Information', $currentPage, 'fa fa-male');

        $viewData['employee'] = Employee::find($id);

        return View::make('employees.show', $viewData);
    }

    public function edit($id)
    {
        $currentPage = [
            'Employees' => [
                'url' => URL::route('employees_index_path')
            ],
            'Update Employee' => [
                'isCurrentPage' => true
            ]
        ];

        $viewData = ViewDataHelper::createViewHeaderData('Employee', 'Update Information', $currentPage, 'fa fa-user');

        $viewData = array_merge($viewData, [
            'genders'       =>      ['male' => 'Male', 'female' => 'Female'],
            'departments' => Department::getDataForSelect(),
            'branches' => Branch::getDataForSelect(),
            'roles' => Role::getDataForSelect(['admin', 'moderator']),
            'currentEmployee' => Employee::find($id)
        ]);

        return View::make('employees.edit', $viewData);
    }

	/**
	 * Update the specified resource in storage.
	 * PUT /employee/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		dd('update employee '.$id);
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /employee/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        try {
            $input['id'] = $id;

            $this->terminateEmployeeForm->validate($input);

            $this->execute(TerminateEmployeeCommand::class, $input);

            $success = ['title' => 'Success', 'message' => 'Successfully closed branch.'];

            return Response::json($success);

        } catch ( Laracasts\Validation\FormValidationException $exception ) {

            $errors = $exception->getErrors()->toArray();

            return Response::json($errors, 400);
        }
	}

}
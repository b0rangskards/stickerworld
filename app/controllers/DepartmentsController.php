<?php

use Acme\Departments\CloseDepartmentCommand;
use Acme\Departments\NewDepartmentCommand;
use Acme\Departments\UpdateDepartmentCommand;
use Acme\Forms\AddNewDepartmentForm;
use Acme\Departments\DepartmentRepository;
use Acme\Forms\CloseDepartmentForm;
use Acme\Forms\UpdateDepartmentForm;
use Acme\Helpers\ViewDataHelper;

class DepartmentsController extends \BaseController {

    protected $departmentRepository;

    protected $addNewDepartmentForm;

    protected $closeDepartmentForm;

    protected $updateDepartmentForm;

    /**
     * @param DepartmentRepository $departmentRepository
     * @param AddNewDepartmentForm $addNewDepartmentForm
     * @param CloseDepartmentForm $closeDepartmentForm
     * @param UpdateDepartmentForm $updateDepartmentForm
     */
    function __construct(DepartmentRepository $departmentRepository, AddNewDepartmentForm $addNewDepartmentForm, CloseDepartmentForm $closeDepartmentForm, UpdateDepartmentForm $updateDepartmentForm)
    {
        $this->departmentRepository = $departmentRepository;

        $this->addNewDepartmentForm = $addNewDepartmentForm;

        $this->closeDepartmentForm = $closeDepartmentForm;

        $this->updateDepartmentForm = $updateDepartmentForm;
    }

    /**
	 * Display a listing of the resource.
	 * GET /departments
	 *
	 * @return Response
	 */
	public function index()
	{
        $viewData = ViewDataHelper::createViewHeaderData('Department', 'Management', 'Manage Department', 'fa fa-certificate');

        $viewData = array_merge($viewData, [
            'data'      =>  $this->departmentRepository->getTableData(),
            'columns'   =>  $this->departmentRepository->getTableColumns()
        ]);

        return View::make('departments.index', $viewData);
	}


	/**
	 * Store a newly created resource in storage.
	 * POST /new
	 *
	 * @return Response
	 */
	public function store()
	{
		try {
            $this->addNewDepartmentForm->validate(Input::only('name'));

            $this->execute(NewDepartmentCommand::class);

            $success = ['title' => 'Success', 'message' => 'Successfully opened new department.'];

            return Response::json($success);

        } catch ( Laracasts\Validation\FormValidationException $exception ) {

            $errors = $exception->getErrors()->toArray();

            return Response::json($errors, 400);
        }
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /departments/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{
        try {
            $this->updateDepartmentForm->validate(Input::all());

            $this->execute(UpdateDepartmentCommand::class);

            $success = ['title' => 'Success', 'message' => 'Successfully updated.'];

            return Response::json($success);

        } catch ( Laracasts\Validation\FormValidationException $exception ) {
            $errors = [];

            if ( is_object($exception->getErrors()) ) {
                $errors = $exception->getErrors()->toArray();
            } else {
                $errors = $exception->getErrors();
            }

            return Response::json($errors, 400);
        }
    }

    public function edit($id)
    {
        $department = Department::where('id', $id)->select('id', 'name')->first();

        return Response::json(['obj' => $department->toArray()]);
    }
	/**
	 * Remove the specified resource from storage.
	 * DELETE /departments/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        try {
            $inputs = ['id' => $id];

            $this->closeDepartmentForm->validate($inputs);

            $this->execute(CloseDepartmentCommand::class, $inputs);

            $success = ['title' => 'Success', 'message' => 'Successfully closed department.'];

            return Response::json($success);

        } catch ( Laracasts\Validation\FormValidationException $exception ) {

            $errors = $exception->getErrors()->toArray();

            return Response::json($errors, 400);
        }
	}

}
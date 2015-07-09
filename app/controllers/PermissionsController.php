<?php

use Acme\AccessControl\Permissions\DeletePermissionCommand;
use Acme\AccessControl\Permissions\NewPermissionCommand;
use Acme\AccessControl\Permissions\UpdatePermissionCommand;
use Acme\Forms\AddNewPermissionForm;
use Acme\Forms\DeletePermissionForm;
use Acme\Forms\UpdatePermissionForm;
use Acme\Helpers\DataHelper;

class PermissionsController extends \BaseController {

    protected $addNewPermissionForm;

    protected $deletePermissionForm;

    protected $updatePermissionForm;

    /**
     * @param AddNewPermissionForm $addNewPermissionForm
     * @param DeletePermissionForm $deletePermissionForm
     * @param UpdatePermissionForm $updatePermissionForm
     */
    function __construct(AddNewPermissionForm $addNewPermissionForm, DeletePermissionForm $deletePermissionForm, UpdatePermissionForm $updatePermissionForm)
    {
        $this->addNewPermissionForm = $addNewPermissionForm;

        $this->deletePermissionForm = $deletePermissionForm;

        $this->updatePermissionForm = $updatePermissionForm;
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
            $this->addNewPermissionForm->validate(Input::all());

            $this->execute(NewPermissionCommand::class);

            $success = ['title' => 'Success', 'message' => 'Successfully created new permission.'];

            return Response::json($success);

        } catch ( Laracasts\Validation\FormValidationException $exception ) {

            $errors = $exception->getErrors()->toArray();

            return Response::json($errors, 400);
        }
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /update
	 *
	 * @return Response
	 */
	public function update()
	{
        try {
            $this->updatePermissionForm->validate(Input::all());

            $this->execute(UpdatePermissionCommand::class);

            $success = ['title' => 'Success', 'message' => 'Permission Successfully updated.'];

            return Response::json($success);

        } catch ( Laracasts\Validation\FormValidationException $exception ) {
            $errors = [];

            $errors = DataHelper::getErrorDataFromException($exception);

            return Response::json($errors, 400);
        }
	}

    public function edit($id)
    {
        $permission = Permission::where('id', $id)->select('id', 'name', 'group_id', 'route', 'description')->first();

        return Response::json(['obj' => $permission->toArray()]);
    }

	/**
	 * Remove the specified resource from storage.
	 * DELETE /delete
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        try {
            $inputs = ['id' => $id];

            $this->deletePermissionForm->validate($inputs);

            $this->execute(DeletePermissionCommand::class, $inputs);

            $success = ['title' => 'Success', 'message' => 'Successfully deleted permission.'];

            return Response::json($success);

        } catch ( Laracasts\Validation\FormValidationException $exception ) {

            $errors = $exception->getErrors()->toArray();

            return Response::json($errors, 400);
        }
	}

}
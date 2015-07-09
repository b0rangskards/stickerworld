<?php

use Acme\AccessControl\PermissionGroups\DeletePermissionGroupCommand;
use Acme\AccessControl\PermissionGroups\NewPermissionGroupCommand;
use Acme\AccessControl\PermissionGroups\UpdatePermissionGroupCommand;
use Acme\Forms\AddNewPermissionGroupForm;
use Acme\Forms\DeletePermissionGroupForm;
use Acme\Forms\UpdatePermissionGroupForm;

class PermissionGroupsController extends \BaseController {

    protected $addNewPermissionGroupForm;

    protected $deletePermissionGroupForm;

    protected $updatePermissionGroupForm;

    /**
     * @param AddNewPermissionGroupForm $addNewPermissionGroupForm
     * @param DeletePermissionGroupForm $deletePermissionGroupForm
     * @param UpdatePermissionGroupForm $updatePermissionGroupForm
     */
    function __construct(AddNewPermissionGroupForm $addNewPermissionGroupForm, DeletePermissionGroupForm $deletePermissionGroupForm, UpdatePermissionGroupForm $updatePermissionGroupForm)
    {
        $this->addNewPermissionGroupForm = $addNewPermissionGroupForm;

        $this->deletePermissionGroupForm = $deletePermissionGroupForm;

        $this->updatePermissionGroupForm = $updatePermissionGroupForm;
    }


    /**
	 * Store a newly created resource in storage.
	 * POST /permissiongroups
	 *
	 * @return Response
	 */
	public function store()
	{
        try {
            $this->addNewPermissionGroupForm->validate(Input::only('name'));

            $this->execute(NewPermissionGroupCommand::class);

            $success = ['title' => 'Success', 'message' => 'Successfully created new permission.'];

            return Response::json($success);

        } catch ( Laracasts\Validation\FormValidationException $exception ) {

            $errors = $exception->getErrors()->toArray();

            return Response::json($errors, 400);
        }
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /update_group
	 *
	 * @return Response
	 */
	public function update()
	{
        try {
            $this->updatePermissionGroupForm->validate(
                [
                    'id' => Input::get('pk'),
                    'name' => Input::get('value'),
                ]
            );

            $this->execute(UpdatePermissionGroupCommand::class);

            return Response::json(['message' => 'Role name successfully changed.']);

        } catch ( Laracasts\Validation\FormValidationException $exception ) {

            $errors = $exception->getErrors()->toArray();

            return Response::json($errors, 400);
        }
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /delete_group
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        try {
            $inputs = ['id' => $id];

            $this->deletePermissionGroupForm->validate($inputs);

            $this->execute(DeletePermissionGroupCommand::class, $inputs);

            $success = ['title' => 'Success', 'message' => 'Successfully deleted permission group.'];

            return Response::json($success);

        } catch ( Laracasts\Validation\FormValidationException $exception ) {

            $errors = $exception->getErrors()->toArray();

            return Response::json($errors, 400);
        }
	}

}
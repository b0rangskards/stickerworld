<?php

use Acme\AccessControl\Roles\ChangeRoleNameCommand;
use Acme\AccessControl\Roles\DeleteRoleCommand;
use Acme\AccessControl\Roles\NewRoleCommand;
use Acme\Forms\AddNewRoleForm;
use Acme\Forms\ChangeRoleNameForm;
use Acme\Forms\DeleteRoleForm;

class RolesController extends \BaseController {

    protected $addNewRoleForm;

    protected $deleteRoleForm;

    protected $changeRoleNameForm;

    /**
     * @param AddNewRoleForm $addNewRoleForm
     * @param DeleteRoleForm $deleteRoleForm
     * @param ChangeRoleNameForm $changeRoleNameForm
     */
    function __construct(AddNewRoleForm $addNewRoleForm,DeleteRoleForm $deleteRoleForm, ChangeRoleNameForm $changeRoleNameForm)
    {
        $this->addNewRoleForm = $addNewRoleForm;

        $this->deleteRoleForm = $deleteRoleForm;

        $this->changeRoleNameForm = $changeRoleNameForm;
    }

    /**
	 * Store a newly created resource in storage.
	 * POST /roles
	 *
	 * @return Response
	 */
	public function store()
	{
        try {
            $this->addNewRoleForm->validate(Input::all());

            $this->execute(NewRoleCommand::class);

            $success = ['title' => 'Success', 'message' => 'Successfully created new role.'];

            return Response::json($success);

        } catch ( Laracasts\Validation\FormValidationException $exception ) {

            $errors = $exception->getErrors()->toArray();

            return Response::json($errors, 400);
        }
	}

    /**
     * Update the specified resource in storage.
     * @return Response
     */
	public function update()
	{
        try {
            $this->changeRoleNameForm->validate(
                [
                    'id' => Input::get('pk'),
                    'name' => Input::get('value')
                ]
            );

            $this->execute(ChangeRoleNameCommand::class);

            return Response::json(['message' => 'Role name successfully changed.']);

        } catch ( Laracasts\Validation\FormValidationException $exception ) {

            $errors = $exception->getErrors()->toArray();

            return Response::json($errors, 400);
        }
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /roles/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        try {
            $inputs = ['id' => $id];

            $this->deleteRoleForm->validate($inputs);

            $this->execute(DeleteRoleCommand::class, $inputs);

            $success = ['title' => 'Success', 'message' => 'Successfully deleted role.'];

            return Response::json($success);

        } catch ( Laracasts\Validation\FormValidationException $exception ) {

            $errors = $exception->getErrors()->toArray();

            return Response::json($errors, 400);
        }
	}

}
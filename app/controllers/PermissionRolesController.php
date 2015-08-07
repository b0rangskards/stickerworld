<?php

use Acme\AccessControl\PermissionRoles\GrantRoleAPermissionCommand;
use Acme\AccessControl\PermissionRoles\GrantRolePermissionByGroupCommand;
use Acme\AccessControl\PermissionRoles\RevokePermissionOnRoleCommand;
use Acme\Forms\GrantRolePermissionByGroupForm;
use Acme\Forms\GrantRolePermissionForm;
use Acme\Forms\RevokeRolePermissionForm;
use Acme\Helpers\DataHelper;
use Illuminate\Http\Response as ResponseIlluminate;

class PermissionRolesController extends \BaseController {

    protected $grantRolePermissionForm;

    protected $revokeRolePermissionForm;

    function __construct(GrantRolePermissionForm $grantRolePermissionForm,
                         RevokeRolePermissionForm $revokeRolePermissionForm)
    {
        $this->grantRolePermissionForm = $grantRolePermissionForm;

        $this->revokeRolePermissionForm = $revokeRolePermissionForm;
    }

    /**
	 * Store a newly created resource in storage.
	 * POST /permissionroles
	 *
	 * @return Response
	 */
	public function store()
	{
        try {
            $this->grantRolePermissionForm->validate(Input::all());

            $id = $this->execute(GrantRoleAPermissionCommand::class);

            $responseData = [
                'title'            => 'Success',
                'message'          => 'Successfully granted permission.',
                'permissionRoleId' => $id
            ];

            return Response::json($responseData);

        } catch ( Laracasts\Validation\FormValidationException $exception ) {

            $errors = DataHelper::getErrorDataFromException($exception);

            return Response::json($errors, ResponseIlluminate::HTTP_BAD_REQUEST);
        }
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /revoke
	 *
	 * @return Response
	 */
	public function destroy()
	{
        try {
            $this->revokeRolePermissionForm->validate(Input::all());

            $this->execute(RevokePermissionOnRoleCommand::class);

            $success = ['title' => 'Success', 'message' => 'Successfully revoked permission.'];

            return Response::json($success);

        } catch ( Laracasts\Validation\FormValidationException $exception ) {
            $errors = $exception->getErrors()->toArray();

            return Response::json($errors, ResponseIlluminate::HTTP_BAD_REQUEST);
        }
	}

}
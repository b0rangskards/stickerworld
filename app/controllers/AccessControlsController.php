<?php

use Acme\AccessControl\AccessControlRepository;
use Acme\AccessControl\Permissions\PermissionRepository;
use Acme\Helpers\ViewDataHelper;

class AccessControlsController extends \BaseController {

    private $accessControlRepository;

    private $permissionRepository;

    /**
     * @param AccessControlRepository $accessControlRepository
     * @param PermissionRepository $permissionRepository
     */
    function __construct(AccessControlRepository $accessControlRepository, PermissionRepository $permissionRepository)
    {
        $this->accessControlRepository = $accessControlRepository;

        $this->permissionRepository = $permissionRepository;
    }

    /**
	 * Display a listing of the resource.
	 * GET /access_control
	 *
	 * @return Response
	 */
	public function index()
	{
        $viewData = ViewDataHelper::createViewHeaderData('Access Control', 'Roles & Permissions', 'Access Control', 'fa fa-eye-slash');

        $viewData = array_merge($viewData, [
           'columns'               =>  $this->accessControlRepository->getTableColumns(),

           /* For New Permission Form */
           'selectOptionRoutes'    => $this->permissionRepository->getRoutesForSelectOption(),
           'selectOptionAllRoutes' => $this->permissionRepository->getAllRoutesForSelectOption()
        ]);

        $query = Request::get('q');

        $viewData['data'] = $query
                ?   $this->accessControlRepository->search($query)
                :   $this->accessControlRepository->getTableData();

        return View::make('access_control.index', $viewData);
	}



}
<?php


use Acme\Branches\AddNewBranchCommand;
use Acme\Branches\BranchRepository;
use Acme\Branches\CloseBranchCommand;
use Acme\Branches\UpdateBranchInformationCommand;
use Acme\Forms\AddNewBranchForm;
use Acme\Forms\CloseBranchForm;
use Acme\Forms\UpdateBranchInformationForm;
use Acme\Helpers\DataHelper;
use Acme\Helpers\ViewDataHelper;
use Chumper\Datatable\Datatable;

class BranchesController extends BaseController {

    private $branchRepository;

    private $addNewBranchForm;

    private $closeBranchForm;

    private $updateBranchInformationForm;

    /**
     * @param AddNewBranchForm $addNewBranchForm
     * @param BranchRepository $branchRepository
     * @param CloseBranchForm $closeBranchForm
     * @param UpdateBranchInformationForm $updateBranchInformationForm
     */
    function __construct(AddNewBranchForm $addNewBranchForm, BranchRepository $branchRepository, CloseBranchForm $closeBranchForm, UpdateBranchInformationForm $updateBranchInformationForm)
    {
        $this->addNewBranchForm = $addNewBranchForm;

        $this->branchRepository = $branchRepository;

        $this->closeBranchForm = $closeBranchForm;

        $this->updateBranchInformationForm = $updateBranchInformationForm;
    }


    /**
	 * Display a listing of the resource.
	 * GET /branches
	 *
	 * @return Response
	 */
	public function index()
	{
        $viewData = ViewDataHelper::createViewHeaderData('Branches', 'Management', 'Manage Branch', 'fa fa-building-o');

        $viewData = array_merge($viewData, [
           'columns'    => $this->branchRepository->getTableColumns()
        ]);

        $query = Request::get('qbranch');

        $viewData['branches'] = $query
            ? $this->branchRepository->search($query)
            : $this->branchRepository->getPaginated();


        return View::make('branches.index', $viewData);
    }

    /**
     * Store a newly created resource in storage.
     * POST /branches
     *
     * @return Response
     */
    public function store()
    {
        try{
            $this->addNewBranchForm->validate(Input::all());

            $this->execute(AddNewBranchCommand::class);

            $success = ['title' => 'Success', 'message' => 'Successfully opened new branch.'];

            return Response::json($success);

        } catch(Laracasts\Validation\FormValidationException $exception ) {

            $errors = $exception->getErrors()->toArray();

            return Response::json($errors, 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /branches/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        try {

            $input['id'] = $id;

            $this->closeBranchForm->validate($input);

            $this->execute(CloseBranchCommand::class, $input);

            $success = ['title' => 'Success', 'message' => 'Successfully closed branch.'];

            return Response::json($success);

        } catch( Laracasts\Validation\FormValidationException $exception) {

            $errors = $exception->getErrors()->toArray();

            return Response::json($errors, 400);
        }
    }

    /**
     * Fetch the branch data.
     * GET /branches/fetchdata/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $branch = Branch::where('id', $id)->select('id', 'name', 'address', 'contact_no', 'lat', 'lng')->first();

        return Response::json(['obj' => $branch->toArray()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return Response
     */
    public function update()
    {
        try {
            $this->updateBranchInformationForm->validate(Input::all());

            $this->execute(UpdateBranchInformationCommand::class);

            $success = ['title' => 'Success', 'message' => 'Successfully updated.'];

            return Response::json($success);

        } catch ( Laracasts\Validation\FormValidationException $exception ) {
            $errors = DataHelper::getErrorDataFromException($exception);

            return Response::json($errors, 400);
        }
    }


}
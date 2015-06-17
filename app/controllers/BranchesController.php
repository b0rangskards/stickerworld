<?php


use Chumper\Datatable\Datatable as Datatable1;
use Chumper\Datatable\Datatable;

class BranchesController extends \BaseController {

    private $dataTable;

    /**
     * Check User if logged in
     * @param Datatable $dataTable
     */
    function __construct(Datatable $dataTable)
    {
        $this->beforeFilter('auth');

        $this->dataTable = $dataTable;
    }


    /**
	 * Display a listing of the resource.
	 * GET /branches
	 *
	 * @return Response
	 */
	public function index()
	{
        $data['datatable'] = \Datatable::table()
            ->addColumn('username', 'recstat')
            ->setUrl(URL::route('branches_collection_path'))
            ->setOptions(
                array(
                    'dom' => "T<'clear'>lfrtip"
                )
            )
            ->render('users.partials.datatable');

	    return View::make('branches.index', $data);
    }

    /**
     * Show the form for creating a new branch.
     * GET /branches/new
     *
     * @return Response
     */
    public function newBranch()
    {

    }

    public function getDatatable()
    {
        return $this->dataTable->collection(User::all())
            ->showColumns('username', 'recstat')
            ->addColumn('username', function ($model) {
                return '<span class="weight600">'.$model->username.'</span>';
            })
            ->addColumn('recstat', function ($model) {
                return $model->recstat === 'A'
                    ? '<span class="badge bg-success">Yes</span>'
                    : '<span class="badge bg-danger">No</span>';
            })
            ->searchColumns('username')
            ->orderColumns('username')
            ->make();
    }

	/**
	 * Show the form for creating a new resource.
	 * GET /branches/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /branches
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /branches/{id}
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
	 * GET /branches/{id}/edit
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
	 * PUT /branches/{id}
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
	 * DELETE /branches/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
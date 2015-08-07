<?php

use Acme\Forms\UpdateCompanySettingsForm;
use Acme\Helpers\ViewDataHelper;
use Acme\Users\Settings\UpdateCompanySettingsCommand;
use Laracasts\Flash\Flash;

class UserSettingsController extends \BaseController {

	private $updateCompanySettingsForm;

	function __construct(UpdateCompanySettingsForm $updateCompanySettingsForm)
	{
		$this->updateCompanySettingsForm = $updateCompanySettingsForm;
	}

	/**
	 * Display a listing of the resource.
	 * GET /usersettings
	 *
	 * @return Response
	 */
	public function index()
	{
		$user = Auth::user();

		$viewData = ViewDataHelper::createViewHeaderData('Settings', '', 'Settings', 'fa fa-cog');

		$viewData['user'] = $user;
		$viewData['generalSettings'] = GeneralSetting::first();

		return View::make('user_settings.index', $viewData);
	}


	public function update()
	{
		$this->updateCompanySettingsForm->validate(Input::all());

		$this->execute(UpdateCompanySettingsCommand::class);

		Flash::message('Successfully updated settings.');

		return Redirect::back();
	}


	/**
	 * Show the form for creating a new resource.
	 * GET /usersettings/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /usersettings
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /usersettings/{id}
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
	 * GET /usersettings/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 * DELETE /usersettings/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
<?php

class PagesController extends \BaseController {


    function __construct()
    {
        $this->beforeFilter('auth', ['except' => 'pageNotFound']);
    }

    public function dashboard()
	{
        return View::make('pages.home');
	}

    public function pageNotFound()
    {
        return View::make('pages.page_not_found');
    }

}
<?php

class PagesController extends \BaseController {

    public function dashboard()
	{
        return View::make('pages.home');
	}

    public function pageNotFound()
    {
        return View::make('pages.page_not_found');
    }

}
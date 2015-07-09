<?php

class PagesController extends \BaseController {

    public function pageNotFound()
    {
        return View::make('pages.page_not_found');
    }

    public function unauthorized()
    {
        return View::make('pages.unauthorized');
    }

}
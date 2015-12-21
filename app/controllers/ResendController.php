<?php

class ResendController extends \BaseController {

    //Display a matrix table of subscribers to codes
	public function getIndex()
	{
		return View::make('admin.resend')->withSubscribers($data);
	}

    public function getSubscriber()
    {
        return View::make('admin.resend')->withSubscribers($data);
    }

}
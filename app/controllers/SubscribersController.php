<?php

class SubscribersController extends \BaseController {

    public function getIndex(){
        return View::make('admin.subscribers.index')->withSubscribers(Subscriber::all());
    }

}
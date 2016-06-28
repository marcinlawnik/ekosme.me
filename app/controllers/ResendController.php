<?php

class ResendController extends \BaseController
{
    //Display a matrix table of subscribers to codes
    public function getIndex()
    {
        $subscribers = Subscriber::whereActive(1)->get();

        return View::make('admin.resend.index')->withSubscribers($subscribers);
    }

    public function getSubscriber($id)
    {
        $codes = Code::whereSubscriberId($id)->get();

        $memes = Meme::all();

        foreach ($codes as $code) {
            $sent[] = $code->meme_id;
        }

        return View::make('admin.resend.user')->withMemes($memes)->withSent($sent);
    }
}

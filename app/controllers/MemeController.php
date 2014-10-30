<?php

class MemeController extends \BaseController {

    public function getSend($id = ''){

        return View::make('admin.meme.send')->withId($id);

    }

    public function postSend(){
        //Get subscribers
        $subscribers = Subscriber::confirmed()->get();

        //Get the meme
        $meme = Meme::find(Input::get('meme_id'))->first();
        //Do the sending

        foreach($subscribers as $subscriber){
            $memeCode = Helper::getRandomString(20);

            //Generate code
            Code::create([
                'code' => $memeCode,
                'meme_id' => $meme->id,
                'subscriber_id' => $subscriber->id,
                'used' => 0
            ]);

            //Push e-mail to queue

            Queue::push('SendEmail', [
                'view' => 'emails.meme',
                'recipient' => $subscriber->email,
                'subject' => 'Nowy mem od ekosme.me - "'.$meme->name.'"!',
                'data' => [
                    'memeCode' => $memeCode,
                    'memeName' => $meme->name
                ]
            ]);
        }

    }

}
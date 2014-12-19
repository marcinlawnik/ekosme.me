<?php

class EmailController extends \BaseController {

    public function getSend(){
        return View::make('admin.mail.main');
    }

    public function postSend(){
        //Get subscribers
        $subscribers = Subscriber::confirmed()->get();

        //Do the sending
        foreach($subscribers as $subscriber){
            //Push e-mail to queue

            Queue::push('SendEmail', [
                'view' => 'emails.blank',
                'recipient' => $subscriber->email,
                'subject' => 'Wiadomość od ekosme.me - "'.Input::get('topic').'"!',
                'data' => [
                    'contents' => nl2br(Input::get('message'))
                ]
            ]);
        }
    }

}
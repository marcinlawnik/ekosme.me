<?php

class SendEmail {
    public function fire($job, $data){
        $recipient = $data['recipient'];
        Mail::send($data['view'], $data['data'], function($message) use ($recipient){
            $message->to($recipient)->subject('Nowy mem od ekosme.me!');
        });
        $job->delete();
    }
}
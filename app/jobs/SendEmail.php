<?php

class SendEmail
{
    public function fire($job, $data)
    {
        $recipient = $data['recipient'];
        $subject = $data['subject'];
        Mail::send($data['view'], $data['data'], function ($message) use ($recipient, $subject) {
            $message->to($recipient)->subject($subject);
        });
        $job->delete();
    }
}

<?php

class SuggestController extends \BaseController {

    public function getIndex()
    {
        //Display a form to user
        return View::make('suggest');
    }

    public function postIndex()
    {
        //Process upload
        //Check for filesize and extension
        if (!Input::hasFile('meme'))
        {
            return Redirect::to('suggest')->with('error', 'Nie dodano pliku!');
        }
        // Build the input for our validation
        $input = array(
            'meme' => Input::file('meme'),
            'email' => Input::get('email')
        );

        // Within the ruleset, make sure we let the validator know that this
        // file should be an image
        $rules = array(
            'meme' => 'image|max:5000',
            'email' => 'email'
        );

        $validator = Validator::make($input, $rules);

        if ($validator->fails())
        {
            $failed = $validator->failed();

            if(array_key_exists('meme', $failed)){
                // Redirect with a helpful message to inform the user that
                // the provided file was not an adequate type
                return Redirect::to('/suggest')->with('error', 'To nie jest obrazek lub ma więcej niż 5MB!');
            }

            if(array_key_exists('email', $failed)){
                // Redirect with a helpful message to inform the user that
                // the provided file was not an adequate type
                return Redirect::to('/suggest')->with('error', 'Niepoprawny adres email!');
            }

        }



        $filename = Helper::getRandomString().'.'.Input::file('meme')->getClientOriginalExtension();
        Input::file('meme')->move(storage_path().'/proposed/', $filename);

        $mobileDetect = new Mobile_Detect();

        Proposed::create([
            'filename' => $filename,
            'name' => Input::file('meme')->getClientOriginalName(),
            'email' => Input::get('email'),
            'useragent' => $mobileDetect->getUserAgent(),
            'ip' => Request::getClientIp(),
            'description' => Input::get('description')
        ]);

        //Send email to admin

        Queue::push('SendEmail', [
            'view' => 'emails.admin.proposed',
            'recipient' => 'marcin@lawniczak.me',
            'subject' => 'Nowy zaproponowany mem',
            'data' => [
                'name' => Input::file('meme')->getClientOriginalName(),
            ]
        ]);

        //Tell user everything is okay
        return Redirect::to('/suggest')->with('message', 'Dzięki za propozycję, odezwiemy się do Ciebie!');
    }

}
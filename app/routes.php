<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('index');
});

//Codes
Route::get('/r', function()
{
    $code = Input::get('code');
    return Redirect::to('/c/'.$code);
});

Route::get('/c/{code}', ['uses' => 'CodesController@process']);

//View of memes
Route::get('/v/{hash}', function($hash)
{
    $hashids = new Hashids\Hashids(Config::get('app.key'), 8);
    $id = $hashids->decode($hash);
    $meme = Meme::find($id[0]);
    if(!array_key_exists(0, $id) || is_null($id[0]) || !is_int($id[0])){
        return Redirect::to('/');
    }

    if(is_null($meme)){
        return Redirect::to('/');
    }
    $path = storage_path().'/memes/'.$meme->filename;
    // Get the image
    $image = Image::make($path)->encode('data-url');

    return View::make('meme')->withMeme($meme)->withImage($image);
});


//Subscriptions

Route::get('subscribe', function(){
    return View::make('subscribe');
});

Route::post('subscribe', function(){
    $email = Input::get('email');

    //Check E-mail validity
    $rules = [
        'email' => 'required|email',
    ];
    $data = [
        'email' => $email
    ];
    $validator = Validator::make($data, $rules);
    if($validator->fails())
    {
        return View::make('subscribe')->with('error', 'Adres E-mail jest nieprawidłowy!');
    }

    //Can do further checks
    $explodedEmail = explode('@', $email);
    $domain = $explodedEmail[1];
    if($domain !== 'ekos.edu.pl'){
        //Not an EKOS E-mail
        return View::make('subscribe')->with('error', 'To nie jest e-mail ucznia EKOSu!');
    }

    if(Subscriber::where('email', '=', Input::get('email'))->exists() === true){
        //Already subscribed
        return View::make('subscribe')->with('error', 'Jesteś już subskrybentem ekosme.me');
    }

    //Register subscriber
    //Create record in database
    $confirmationCode = Helper::getRandomString();

    $subscriber = Subscriber::create([
        'email' => Input::get('email'),
        'confirmation_code' => $confirmationCode
    ]);

    $explodedName = explode('_', $explodedEmail[0]);
    $firstName = ucfirst($explodedName[0]);

    //Send activation mail
    Queue::push('SendEmail', [
        'view' => 'emails.activate',
        'recipient' => $subscriber->email,
        'subject' => 'Potwierdzenie adresu e-mail ekosme.me',
        'data' => [
            'firstName' => $firstName,
            'confirmationCode' => $confirmationCode
        ]
    ]);
    //Return success view
    return View::make('subscribe')->with('message', 'Dodano! Potwierdź adres e-mail, aby zacząć otrzymywać memy!');


});

Route::get('subscribe/confirm/{code}', function($code){
    //Find if subscriber with code does not exist
    if(Subscriber::where('confirmation_code', '=', $code)->exists() === false){
        //Throw error
        return View::make('subscribe')->with('error', 'Konto zostało już aktywowane lub podano błędny kod!');
    }
    //Else
    //Activate
    $subscriber = Subscriber::where('confirmation_code', '=', $code)->first();
    $subscriber->confirmation_code = null;
    $subscriber->confirmed = 1;
    $subscriber->activation_code = Helper::getRandomString(30);
    $subscriber->save();
    //Send E-mail to admin to confirm account
    Queue::push('SendEmail', [
        'view' => 'emails.admin.activate',
        'recipient' => 'marcin@lawniczak.me',
        'subject' => 'Potwierdzenie konta ekosme.me - '.$subscriber->email,
        'data' => [
            'subscriberEmail' => $subscriber->email,
            'activationCode' => $subscriber->activation_code,
        ]
    ]);
    //Display success view
    return View::make('subscribe')->with('message', 'E-mail potwierdzony! Wyślemy wiadomość, gdy administrator potwierdzi twoje konto!');
});


//Admin pages

Route::group(['prefix' => 'a', 'before' => 'l4-lock.auth'], function(){
    Route::get('/', ['uses' => 'AdminController@getIndex']);

    Route::group(['prefix' => 'subscribers'], function(){

        Route::get('/', ['uses' => 'SubscribersController@getIndex']);
        Route::get('activate/{code}', ['uses' => 'AdminController@getConfirmSubscribe']);

    });

    Route::group(['prefix' => 'mail'], function(){

        Route::get('send', ['uses' => 'EmailController@getSend']);

        Route::post('send', ['uses' => 'EmailController@postSend']);

    });

    Route::group(['prefix' => 'meme'], function(){

        Route::get('list', ['uses' => 'AdminController@getMemeList']);

        Route::get('add', ['uses' => 'AdminController@getMemeAdd']);

        Route::post('add', ['uses' => 'AdminController@postMemeAdd']);

        Route::get('edit/{id}', ['uses' => 'AdminController@getMemeEdit']);

        Route::post('edit', ['uses' => 'AdminController@postMemeEdit']);

        Route::get('send', ['uses' => 'MemeController@getSend']);

        Route::get('send/{id}', ['uses' => 'MemeController@getSend']);

        Route::post('send', ['uses' => 'MemeController@postSend']);
    });

});

Route::get('test', function(){
	return View::make('admin.mail.main');
});

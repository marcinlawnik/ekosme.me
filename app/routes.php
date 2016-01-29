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

    $latestMeme = Meme::all()->last();

    $stats = [
        'meme_title' => $latestMeme->name,
        'memes_sent' => $latestMeme->codes->count(),
        'memes_opened' => $latestMeme->codes()->where('used', '=', '1')->count(),
        'votes' => $latestMeme->codes()->whereNotNull('vote')->count(),
        'votes_like' => $latestMeme->codes()->where('vote', '=', '1')->count(),
        'votes_dislike' => $latestMeme->codes()->where('vote', '=', '0')->count()
    ];
    //Avoid division by zero if memes weren't sent yet, not seen or not voted
    if($stats['memes_sent'] === 0){
        $stats['memes_sent'] = 1;
    }
    if($stats['memes_opened'] === 0){
        $stats['memes_opened'] = 1;
    }
    if($stats['votes'] === 0){
        $stats['votes'] = 1;
    }
    $stats['memes_opened_percentage'] = round($stats['memes_opened'] / $stats['memes_sent'] * 100, 1);
    $stats['voted_percentage'] = round($stats['votes'] / $stats['memes_opened'] * 100, 1);
    $stats['votes_like_percentage'] = round($stats['votes_like'] / $stats['votes'] * 100, 1);
    $stats['votes_dislike_percentage'] = round($stats['votes_dislike'] / $stats['votes'] * 100, 1);

    return View::make('index')->withStats($stats);
});

//Top memes display

Route::get('/top', ['uses' => 'TopController@getIndex']);

//Upload of memes for users

Route::get('/suggest', ['uses' => 'SuggestController@getIndex']);

Route::post('/suggest', ['uses' => 'SuggestController@postIndex']);

//Display of images on request


Route::get('images/{image}', function($image = null)
{
    $path = storage_path().'/memes/' . $image;
    if (file_exists($path)) {
        return Response::download($path);
    }

    $path = storage_path().'/images/' . $image;
    if (file_exists($path)) {
        return Response::download($path);
    }

});

//Download of reports

Route::get('/download/reports/{report}', function($report = null)
{
    $path = storage_path().'/reports/' . $report;
    if (file_exists($path)) {
        return Response::download($path);
    }

});

//Static pages

Route::get('/mustknow', function(){
    return View::make('static.mustknow');
});

Route::get('/skins', function(){
    return View::make('static.skins');
});

Route::group(['prefix' => 'hs'], function(){

    Route::get('/', function(){
        return View::make('hs.index');
    });

    Route::get('rules', function(){
        return View::make('hs.rules');
    });

    Route::get('ranks', function(){
        return View::make('hs.ranks');
    });

    Route::get('register', function(){
        return View::make('hs.register')->with('error', 'Trzeba być zalogowanym w domenie ekos.edu.pl, aby zobaczyć formularz!');
    });

    Route::get('contact', function(){
        return View::make('hs.contact');
    });

});

//Codes
Route::get('/r', function()
{
    if(is_null(Input::get('code'))){
        return Redirect::to('/')->with('error', 'Puste pole z kodem');
    }
    $mobileDetect = new Mobile_Detect();
    PushBullet::type('windows')->note('ekosme.me - tekst ze strony głównej', json_encode([
            'text' => Input::get('code'),
            'ip' => Request::getClientIp(),
            'useragent' => $mobileDetect->getUserAgent()
        ]));
    $code = Input::get('code');
    return Redirect::to('/c/'.$code);
});

Route::get('/c/{code}', ['uses' => 'CodesController@process']);

Route::get('/c', function(){
    return Redirect::to('/')->with('error', 'Puste pole z kodem');
});

//Voting

Route::get('/vote/{code}', ['uses' => 'VoteController@getVote']);

Route::get('/vote/{code}/{vote}', ['uses' => 'VoteController@postVote']);

//View of memes
Route::get('/v/{hash}', ['as' => 'v' ,function($hash)
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

    //Create image path
    $image = '/images/'.$meme->filename;

    return View::make('meme')->withMeme($meme)->withImage($image);
}]);


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
        PushBullet::type('windows')->note('Błąd subskrypcji', json_encode($data));
        return View::make('subscribe')->with('error', 'Adres E-mail jest nieprawidłowy!');
    }

    //Can do further checks
    $explodedEmail = explode('@', $email);
    $domain = $explodedEmail[1];
    if($domain !== 'ekos.edu.pl'){
        PushBullet::type('windows')->note('Błąd subskrypcji', json_encode($data));
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

    PushBullet::type('windows')->note('Nowa subskrybcja', $subscriber->email);

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

    Route::get('resend', ['uses' => 'ResendController@getIndex']);

    Route::get('resend/{id}', function($id){

        $codes = Code::whereSubscriberId($id)->get();

        $memes = Meme::all();

        foreach($codes as $code) {
            $sent[] = $code->meme_id;
        }

        return View::make('admin.resend')->withMemes($memes)->withSent($sent);
    });

    Route::get('resend/subscriber/{subscriberId}/meme/{memeId}', ['uses' => 'ResendController@getIndex']);

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

    Route::get('reports/{subscriberId}', ['uses' => 'ReportController@getIndex']);

    Route::get('reports/charts/meme/{memeid}/subscriber/{subscriberId}',
        ['uses' => 'ReportController@getChart']
    )->where(['memeid' => '[0-9]+', 'userid' => '[0-9]+']);

    Route::get('push', function(){
        PushBullet::all()->note('ekosme.me PushBullet test', 'Testing...');
        return Redirect::to('/')->with('message', 'Testowa wiadomość wysłana');
    });

});

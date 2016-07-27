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

Route::get('/', function () {
    $latestMeme = Meme::all()->last();

    $stats = MemeHelper::getMemeStats($latestMeme);

    return View::make('index')->withStats($stats);
});

//Top memes display

Route::get('/top', ['uses' => 'TopController@getIndex']);

//Upload of memes for users

Route::get('/suggest', ['uses' => 'SuggestController@getIndex']);

Route::post('/suggest', ['uses' => 'SuggestController@postIndex']);

//Display of images on request


Route::get('images/{image}', function ($image = null) {
    $paths = [
        '/images/',
        '/memes/',
    ];

    foreach ($paths as $path) {
        $fullPath = storage_path().$path.$image;
        if (file_exists($fullPath)) {
            return Response::download($fullPath);
        }
    }
});

//Download of reports

Route::get('/download/reports/{report}', function ($report = null) {
    $mobileDetect = new Mobile_Detect();
    PushBullet::type('windows')->note('ekosme.me - download pliku', json_encode([
        'filename'  => $report,
        'ip'        => Request::getClientIp(),
        'useragent' => $mobileDetect->getUserAgent(),
    ]));
    $path = storage_path().'/reports/'.$report;
    if (file_exists($path)) {
        return Response::download($path);
    }
});

//Redirects

Route::get('/konkursmemowy', function () {
    $mobileDetect = new Mobile_Detect();
    PushBullet::type('windows')->note('ekosme.me - kliknięcie linku', json_encode([
        'link'      => 'konkurs memowy',
        'ip'        => Request::getClientIp(),
        'useragent' => $mobileDetect->getUserAgent(),
    ]));

    return Redirect::to('http://www.csw.art.pl/index.php?action=aktualnosci&s2=8&id=1441&lang=');
});

//Static pages

Route::get('/mustknow', function () {
    return View::make('static.mustknow');
});

Route::get('/skins', function () {
    return View::make('static.skins');
});

Route::group(['prefix' => 'hs'], function () {
    Route::get('/', function () {
        return View::make('hs.index');
    });

    Route::get('rules', function () {
        return View::make('hs.rules');
    });

    Route::get('ranks', function () {
        return View::make('hs.ranks');
    });

    Route::get('register', function () {
        return View::make('hs.register')->with('error', 'Trzeba być zalogowanym w domenie ekos.edu.pl, aby zobaczyć formularz!');
    });

    Route::get('contact', function () {
        return View::make('hs.contact');
    });
});

//Codes
Route::get('/r', function () {
    if (is_null(Input::get('code'))) {
        return Redirect::to('/')->with('error', 'Puste pole z kodem');
    }
    $mobileDetect = new Mobile_Detect();
    PushBullet::type('windows')->note('ekosme.me - tekst ze strony głównej', json_encode([
            'text'      => Input::get('code'),
            'ip'        => Request::getClientIp(),
            'useragent' => $mobileDetect->getUserAgent(),
        ]));
    $code = Input::get('code');

    return Redirect::to('/c/'.$code);
});

Route::get('/c/{code}', ['uses' => 'CodesController@process']);

Route::get('/c', function () {
    return Redirect::to('/')->with('error', 'Puste pole z kodem');
});

//Voting

Route::get('/vote/{code}', ['uses' => 'VoteController@getVote']);

Route::get('/vote/{code}/{vote}', ['uses' => 'VoteController@postVote']);

//View of memes
Route::get('/v/{hash}', ['as' => 'v', function ($hash) {
    $hashids = new Hashids\Hashids(Config::get('app.key'), 8);
    $id = $hashids->decode($hash);
    $meme = Meme::find($id[0]);
    if (!array_key_exists(0, $id) || is_null($id[0]) || !is_int($id[0])) {
        return Redirect::to('/');
    }

    if (is_null($meme)) {
        return Redirect::to('/');
    }

    //Create image path
    $image = '/images/'.$meme->filename;

    return View::make('meme')->withMeme($meme)->withImage($image);
}, ]);


//Subscriptions

Route::get('subscribe', function () {
    return View::make('subscribe');
});

Route::post('subscribe', function () {
    $email = Input::get('email');

    //Check E-mail validity
    $rules = [
        'email' => 'required|email',
    ];
    $data = [
        'email' => $email,
    ];
    $validator = Validator::make($data, $rules);
    if ($validator->fails()) {
        PushBullet::type('windows')->note('Błąd subskrypcji', json_encode($data));

        return View::make('subscribe')->with('error', 'Adres E-mail jest nieprawidłowy!');
    }

    //Can do further checks
    $explodedEmail = explode('@', $email);
    $domain = $explodedEmail[1];
    if ($domain !== 'ekos.edu.pl') {
        PushBullet::type('windows')->note('Błąd subskrypcji', json_encode($data));
        //Not an EKOS E-mail
        return View::make('subscribe')->with('error', 'To nie jest e-mail ucznia EKOSu!');
    }

    if (Subscriber::where('email', '=', Input::get('email'))->exists() === true) {
        //Already subscribed
        return View::make('subscribe')->with('error', 'Jesteś już subskrybentem ekosme.me');
    }

    //Register subscriber
    //Create record in database
    $confirmationCode = Helper::getRandomString();

    $subscriber = Subscriber::create([
        'email'             => Input::get('email'),
        'confirmation_code' => $confirmationCode,
    ]);

    $explodedName = explode('_', $explodedEmail[0]);
    $firstName = ucfirst($explodedName[0]);

    //Send activation mail
    Queue::push('SendEmail', [
        'view'      => 'emails.activate',
        'recipient' => $subscriber->email,
        'subject'   => 'Potwierdzenie adresu e-mail ekosme.me',
        'data'      => [
            'firstName'        => $firstName,
            'confirmationCode' => $confirmationCode,
        ],
    ]);

    PushBullet::type('windows')->note('Nowa subskrybcja', $subscriber->email);

    //Return success view
    return View::make('subscribe')->with('message', 'Dodano! Potwierdź adres e-mail, aby zacząć otrzymywać memy!');
});

Route::get('subscribe/confirm/{code}', function ($code) {
    //Find if subscriber with code does not exist
    if (Subscriber::where('confirmation_code', '=', $code)->exists() === false) {
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
        'view'      => 'emails.admin.activate',
        'recipient' => 'marcin@lawniczak.me',
        'subject'   => 'Potwierdzenie konta ekosme.me - '.$subscriber->email,
        'data'      => [
            'subscriberEmail' => $subscriber->email,
            'activationCode'  => $subscriber->activation_code,
        ],
    ]);
    //Display success view
    return View::make('subscribe')->with('message', 'E-mail potwierdzony! Wyślemy wiadomość, gdy administrator potwierdzi twoje konto!');
});


//Admin pages

Route::group(['prefix' => 'a', 'before' => 'l4-lock.auth'], function () {
    Route::get('/', ['uses' => 'AdminController@getIndex']);

    Route::get('resend', ['uses' => 'ResendController@getIndex']);

    Route::get('resend/{id}', ['uses' => 'ResendController@getSubscriber']);

    Route::get('resend/subscriber/{subscriberId}/meme/{memeId}', ['uses' => 'ResendController@getIndex']);

    Route::group(['prefix' => 'subscribers'], function () {
        Route::get('/', ['uses' => 'SubscribersController@getIndex']);
        Route::get('activate/{code}', ['uses' => 'AdminController@getConfirmSubscribe']);
    });

    Route::group(['prefix' => 'mail'], function () {
        Route::get('send', ['uses' => 'EmailController@getSend']);

        Route::post('send', ['uses' => 'EmailController@postSend']);
    });

    Route::group(['prefix' => 'meme'], function () {
        Route::get('list', ['uses' => 'AdminController@getMemeList']);

        Route::get('add', ['uses' => 'AdminController@getMemeAdd']);

        Route::post('add', ['uses' => 'AdminController@postMemeAdd']);

        Route::get('edit/{id}', ['uses' => 'AdminController@getMemeEdit']);

        Route::post('edit', ['uses' => 'AdminController@postMemeEdit']);

        Route::get('send', ['uses' => 'MemeController@getSend']);

        Route::get('send/{id}', ['uses' => 'MemeController@getSend']);

        Route::post('send', ['uses' => 'MemeController@postSend']);
    });

    Route::get('reports', ['uses' => 'ReportController@getIndex']);

    Route::get('reports/{subscriberId}/{type}', ['uses' => 'ReportController@getUser']);

    Route::get('reports/charts/meme/{memeid}/subscriber/{subscriberId}',
        ['uses' => 'ReportController@getChart']
    )->where(['memeid' => '[0-9]+', 'userid' => '[0-9]+']);

    Route::group(['prefix' => 'test'], function () {
        Route::get('push', function () {
            PushBullet::all()->note('ekosme.me PushBullet test', 'Testing...');

            return Redirect::to('/')->with('message', 'Testowa wiadomość wysłana');
        });

        Route::get('queue', function () {
            Queue::push(function ($job) {
                PushBullet::all()->note('ekosme.me PushBullet queue test', 'Testing the queue...');
                $job->delete();
            });

            return Redirect::to('/')->with('message', 'Test kolejki wykonany');
        });

        Route::get('email', function () {
            Queue::push('SendEmail', [
                'view'      => 'emails.meme',
                'recipient' => 'marcin@lawniczak.me',
                'subject'   => 'Nowy mem od ekosme.me - "TESTOWY"!',
                'data'      => [
                    'memeCode' => 'TEST',
                    'memeName' => 'TEST',
                ],
            ]);

            return Redirect::to('/')->with('message', 'Test maila wykonany!');
        });

        Route::get('env', function () {
            dd($_ENV);
        });

        Route::get('error', function () {
            throw new Exception('Test of Exceptions', '666');
        });

    });
});

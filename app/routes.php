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
	return View::make('main');
});

//Codes
Route::get('/r', function()
{
    $code = Input::get('code');
    return Redirect::to('/c/'.$code);
});

Route::get('/c/{code}', ['uses' => 'CodesController@process']);

//Views
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
    $path = storage_path().'\memes\\'.$meme->filename;
    dd($path);
    // Get the image
    $image = Image::make($path)->encode('data-url');

    return View::make('meme')->withMeme($meme)->withImage($image);
});

Route::get('/a/add', function(){
    return View::make('admin.meme.add');
});

Route::post('/a/add', function(){
    //przyjmij plik
    if (!Input::hasFile('meme'))
    {
        dd('lol');
        return Redirect::back();
    }
    //zapisz
    //zmien nazwe
    $filename = Helper::getRandomString().'.'.Input::file('meme')->getClientOriginalExtension();
    Input::file('meme')->move(storage_path().'/memes/', $filename);

    //dodaj do bazy
    $meme = Meme::create([
        'filename' => $filename,
        'name' => Input::get('title'),
        'description' => Input::get('description')
    ]);
    //wygeneruj kody
    $codes = [];
    foreach(range(1, Input::get('code_amount')) as $index){
        $code = Helper::getRandomString(20);
        $codes[$index] = $code;
        Code::create([
            'code' => $code,
            'meme_id' => $meme->id,
            'used' => 0
        ]);
    }
    $hashids = new Hashids\Hashids(Config::get('app.key'), 8);
    $id = $hashids->encode($meme->id);
    //zwroc kody i link
    return View::make('admin.meme.add_success')->withCodes($codes)->withId($id);
});

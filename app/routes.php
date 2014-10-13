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
    $path = storage_path().'/memes/'.$meme->filename;
    // Get the image
    $image = Image::make($path)->encode('data-url');

    return View::make('meme')->withMeme($meme)->withImage($image);
});

Route::get('/a/meme/add', ['uses' => 'AdminController@getMemeAdd']);

Route::post('/a//meme/add', ['uses' => 'AdminController@postMemeAdd']);

Route::get('/a/meme/list', ['uses' => 'AdminController@getMemeList']);

Route::get('/a/meme/edit/{id}', ['uses' => 'AdminController@getMemeEdit']);

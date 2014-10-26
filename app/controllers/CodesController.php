<?php

class CodesController extends \BaseController {

	public function process($code)
	{
        $code = Code::where('code', '=', $code)->first();

        if(is_null($code) || $code->used == 1){
            return Redirect::to('/')->with('error', 'Nie znaleziono!');
        } else {

            //Snapchatty functions
            //Refresh(disappear) after 4 seconds
            header("Refresh: " . 4);

            $code->used = 1;
            $code->used_time = Carbon::now();
            $code->used_ip = Request::getClientIp();
            $mobileDetect = new Mobile_Detect();
            //Check for facebook bots (done in robots.txt)
            $code->used_useragent = $mobileDetect->getUserAgent();
            $code->save();


            $path = storage_path().'/memes/'.Meme::find($code->meme_id)->filename;
            // Get the image
            $image = Image::make($path)->widen(600, function ($constraint) {
                $constraint->upsize();
            })->encode('data-url');

            return View::make('meme')->withMeme($code->meme)->withImage($image);
        }

    }


}
<?php

class CodesController extends \BaseController {

	public function process($code)
	{
        $code = Code::where('code', '=', $code)->first();

        if(is_null($code) || $code->used == 1){
            return Redirect::to('/');
        } else {
            $code->used = 1;
            $code->used_time = Carbon::now();
            $code->used_ip = Request::getClientIp();
            $mobileDetect = new Mobile_Detect();
            $code->used_useragent = $mobileDetect->getUserAgent();
            $code->save();


            $path = storage_path().'/memes/'.Meme::find($code->meme_id)->filename;
            // Get the image
            $image = Image::make($path)->encode('data-url');

            return View::make('meme')->withMeme($code->meme)->withImage($image);
        }

    }


}
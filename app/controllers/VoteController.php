<?php

class VoteController extends \BaseController {

	public function getVote($code)
	{
		$code = Code::where('code', '=', $code)->first();

		if(is_null($code) || !is_null($code->vote)){
			return Redirect::to('/');
		}

		$path = storage_path().'/memes/'.$code->meme->filename;
		// Get the image
		$image = Image::make($path)
			->widen(600, function ($constraint) {
				$constraint->upsize();
			})
			->blur(15)
			->encode('data-url');

		return View::make('meme')
			->withCode($code->code)
			->withMeme($code->meme)
			->withImage($image);
	}

	public function postVote($code, $vote)
	{
		$code = Code::where('code', '=', $code)->first();

		if(is_null($code) || !is_null($code->vote)){
			return Redirect::to('/');
		}

		if($vote === '1' || $vote === '0' ){
			$code->vote = $vote;
			$code->save();

			if($vote === '1'){
				return Redirect::to('/')->with('message', 'Dzięki za poparcie!');
			} else {
				return Redirect::to('/')->with('error', 'Szkoda, że się nie podobało :(');
			}

		} else {
			return Redirect::to('/');
		}

	}

}
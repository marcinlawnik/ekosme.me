<?php

class TopController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
        $memes = Meme::all();

        //Get all memes that have more than 10 votes
        foreach($memes as $meme){
            if($meme->codes()->whereNotNull('vote')->count() > 10){
                $stats[$meme->id] = [
                    'meme_id' => $meme->id,
                    'like_percentage' => $meme->codes()->where('vote', '=', '1')->count() / $meme->codes()->whereNotNull('vote')->count(),
                ];
            }
        }

        //Sort them by approval percentage
        usort($stats, function($a, $b) {
            return $b['like_percentage'] > $a['like_percentage'] ? 1 : -1;
        });

        //Get 10 top memes
        $stats = array_slice($stats, 0, 10);

        $top10Memes = [];

        foreach($stats as $top10Meme){
            $top10Memes[] = Meme::whereId($top10Meme['meme_id'])->first();
        }

        //Counter of memes
        $i=1;
        return View::make('topmemes')->with('memes', $top10Memes)->with('i', $i);
	}

}

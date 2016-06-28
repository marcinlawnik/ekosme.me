<?php

class MemeHelper
{
    public static function getMemeStats(Meme $meme)
    {
        $stats = [
            'meme_title'    => $meme->name,
            'memes_sent'    => $meme->codes->count(),
            'memes_opened'  => $meme->codes()->where('used', '=', '1')->count(),
            'votes'         => $meme->codes()->whereNotNull('vote')->count(),
            'votes_like'    => $meme->codes()->where('vote', '=', '1')->count(),
            'votes_dislike' => $meme->codes()->where('vote', '=', '0')->count(),
        ];
        //Avoid division by zero if memes weren't sent yet, not seen or not voted
        if ($stats['memes_sent'] === 0) {
            $stats['memes_sent'] = 1;
        }
        if ($stats['memes_opened'] === 0) {
            $stats['memes_opened'] = 1;
        }
        if ($stats['votes'] === 0) {
            $stats['votes'] = 1;
        }
        $stats['memes_opened_percentage'] = round($stats['memes_opened'] / $stats['memes_sent'] * 100, 1);
        $stats['voted_percentage'] = round($stats['votes'] / $stats['memes_opened'] * 100, 1);
        $stats['votes_like_percentage'] = round($stats['votes_like'] / $stats['votes'] * 100, 1);
        $stats['votes_dislike_percentage'] = round($stats['votes_dislike'] / $stats['votes'] * 100, 1);

        return $stats;
    }
}

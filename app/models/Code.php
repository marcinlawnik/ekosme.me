<?php

class Code extends \Eloquent {
	protected $fillable = [
        'code',
        'meme_id',
        'used',
        'description',
        'used_time',
        'used_ip',
        'used_useragent'
    ];

    public function meme() {
        return $this->belongsTo('Meme');
    }
}
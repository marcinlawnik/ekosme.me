<?php

class Meme extends \Eloquent {
	protected $fillable = [
        'name',
        'filename',
        'description'
    ];

    public function codes() {
        return $this->hasMany('Code');
    }
}
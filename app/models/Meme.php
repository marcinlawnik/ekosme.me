<?php

/**
 * Meme
 *
 * @property integer $id
 * @property string $filename
 * @property string $name
 * @property string $description
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Code[] $codes
 * @method static \Illuminate\Database\Query\Builder|\Meme whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Meme whereFilename($value)
 * @method static \Illuminate\Database\Query\Builder|\Meme whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\Meme whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\Meme whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Meme whereUpdatedAt($value)
 */
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
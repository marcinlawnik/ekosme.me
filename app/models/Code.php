<?php

/**
 * Code
 *
 * @property integer $id
 * @property string $code
 * @property integer $meme_id
 * @property boolean $used
 * @property string $description
 * @property string $used_time
 * @property string $used_ip
 * @property string $used_useragent
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property integer $subscriber_id
 * @property-read \Meme $meme
 * @method static \Illuminate\Database\Query\Builder|\Code whereId($value) 
 * @method static \Illuminate\Database\Query\Builder|\Code whereCode($value) 
 * @method static \Illuminate\Database\Query\Builder|\Code whereMemeId($value) 
 * @method static \Illuminate\Database\Query\Builder|\Code whereUsed($value) 
 * @method static \Illuminate\Database\Query\Builder|\Code whereDescription($value) 
 * @method static \Illuminate\Database\Query\Builder|\Code whereUsedTime($value) 
 * @method static \Illuminate\Database\Query\Builder|\Code whereUsedIp($value) 
 * @method static \Illuminate\Database\Query\Builder|\Code whereUsedUseragent($value) 
 * @method static \Illuminate\Database\Query\Builder|\Code whereCreatedAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\Code whereUpdatedAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\Code whereSubscriberId($value) 
 */
class Code extends \Eloquent {
	protected $fillable = [
        'code',
        'meme_id',
        'used',
        'description',
        'used_time',
        'used_ip',
        'used_useragent',
        'subscriber_id'
    ];

    public function meme() {
        return $this->belongsTo('Meme');
    }
}
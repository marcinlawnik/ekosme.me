<?php

/**
 * Subscriber
 *
 * @property integer $id
 * @property string $email
 * @property integer $level
 * @property string $description
 * @property integer $active
 * @property integer $confirmed
 * @property string $activation_code
 * @property string $confirmation_code
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\Subscriber whereId($value) 
 * @method static \Illuminate\Database\Query\Builder|\Subscriber whereEmail($value) 
 * @method static \Illuminate\Database\Query\Builder|\Subscriber whereLevel($value) 
 * @method static \Illuminate\Database\Query\Builder|\Subscriber whereDescription($value) 
 * @method static \Illuminate\Database\Query\Builder|\Subscriber whereActive($value) 
 * @method static \Illuminate\Database\Query\Builder|\Subscriber whereConfirmed($value) 
 * @method static \Illuminate\Database\Query\Builder|\Subscriber whereActivationCode($value) 
 * @method static \Illuminate\Database\Query\Builder|\Subscriber whereConfirmationCode($value) 
 * @method static \Illuminate\Database\Query\Builder|\Subscriber whereCreatedAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\Subscriber whereUpdatedAt($value) 
 */

class Subscriber extends \Eloquent {
	protected $fillable = ['email', 'level', 'description', 'active', 'conformed', 'activation_code', 'confirmation_code'];

    public static function scopeConfirmed($query){

        return $query->where('confirmed', '=', 1);

    }
}
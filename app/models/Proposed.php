<?php
/**
 * Proposed
 *
 * @property integer $id
 * @property string $filename
 * @property string $name
 * @property string $email
 * @property string $useragent
 * @property string $description
 * @property string $ip
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\Proposed whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Proposed whereFilename($value)
 * @method static \Illuminate\Database\Query\Builder|\Proposed whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\Proposed whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\Proposed whereUseragent($value)
 * @method static \Illuminate\Database\Query\Builder|\Proposed whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\Proposed whereIp($value)
 * @method static \Illuminate\Database\Query\Builder|\Proposed whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Proposed whereUpdatedAt($value)
 */
class Proposed extends \Eloquent {

    protected $table = 'proposed';

    protected $fillable = [
        'filename',
        'name',
        'email',
        'useragent',
        'description',
        'ip'
    ];
}
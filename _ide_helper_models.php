<?php
/**
 * An helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */

namespace {
    /**
     * Code.
     *
     * @property int $id
     * @property string $code
     * @property int $meme_id
     * @property bool $used
     * @property string $description
     * @property string $used_time
     * @property string $used_ip
     * @property string $used_useragent
     * @property \Carbon\Carbon $created_at
     * @property \Carbon\Carbon $updated_at
     * @property int $subscriber_id
     * @property-read \Meme $meme
     *
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
    class Code
    {
    }
}

namespace {
    /**
     * Meme.
     *
     * @property int $id
     * @property string $filename
     * @property string $name
     * @property string $description
     * @property \Carbon\Carbon $created_at
     * @property \Carbon\Carbon $updated_at
     * @property-read \Illuminate\Database\Eloquent\Collection|\Code[] $codes
     *
     * @method static \Illuminate\Database\Query\Builder|\Meme whereId($value)
     * @method static \Illuminate\Database\Query\Builder|\Meme whereFilename($value)
     * @method static \Illuminate\Database\Query\Builder|\Meme whereName($value)
     * @method static \Illuminate\Database\Query\Builder|\Meme whereDescription($value)
     * @method static \Illuminate\Database\Query\Builder|\Meme whereCreatedAt($value)
     * @method static \Illuminate\Database\Query\Builder|\Meme whereUpdatedAt($value)
     */
    class Meme
    {
    }
}

namespace {
    /**
     * Subscriber.
     *
     * @property int $id
     * @property string $email
     * @property int $level
     * @property string $description
     * @property int $active
     * @property int $confirmed
     * @property string $activation_code
     * @property string $confirmation_code
     * @property \Carbon\Carbon $created_at
     * @property \Carbon\Carbon $updated_at
     *
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
    class Subscriber
    {
    }
}

namespace {
    /**
     * User.
     */
    class User
    {
    }
}

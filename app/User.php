<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'screen_name',
        'photo',
        'vk_id',
        'ok_id',
        'referral_reference',
    ];

    public function token()
    {

        return $this->hasOne('App\Token');
    }

    public function referralUsers()
    {

        return $this->hasMany('App\User');
    }

    public function completedRounds()
    {

        return $this->hasMany('App\CompletedRound');
    }
}

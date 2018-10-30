<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompletedRound extends Model
{
    protected $fillable = [
        'win',
        'chance',
        'bet',
    ];

    public function user()
    {

        return $this->belongsTo('App/User');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{

    protected $fillable = [
        'numberCard', 'evento',
    ];

    public $timestamps = false;

    public function users()
    {
        return $this->belongsToMany('App\User')->withPivot('status');
    }
}

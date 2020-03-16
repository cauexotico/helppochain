<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'block_id', 'hash', 'data'
    ];

    public function block()
    {
        return $this->belongsTo('App\Block');
    }

}

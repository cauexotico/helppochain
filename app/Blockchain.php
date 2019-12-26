<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blockchain extends Model
{
    protected $fillable = [
        'difficulty', 'type'
    ];

    /**
     * Get the blocks of the blockchain.
     */
    public function blocks()
    {
        return $this->hasMany('App\Block');
    }

}

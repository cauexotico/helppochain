<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
	protected $fillable = [
        'blockchain_id', 'nonce', 'data', 'previous_hash', 'hash'
    ];

    /**
     * Get the blockchain of this block.
     */
    public function blockchain()
    {
        return $this->belongsTo('App\Blockchain');
    }
}

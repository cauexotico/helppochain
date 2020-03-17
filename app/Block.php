<?php

namespace App;

use App\Transaction;

use Services\BlockService;

use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
	protected $fillable = [
        'blockchain_id', 'nonce', 'data', 'previous_hash', 'hash'
    ];

    // public function addTransaction($args) 
    // {
    //     $transaction = new Transaction;
    //     $transaction->block_id      = $args['block_id'];
    //     $transaction->hash          = $args['hash'];
    //     $transaction->data          = $args['data'];
    //     $transaction->save();

    //     return $transaction;
    // }

    /**
     * Get the blockchain of this block.
     */
    public function blockchain()
    {
        return $this->belongsTo('App\Blockchain');
    }

    /**
     * Get the transactions of this block.
     */
    public function transactions()
    {
        return $this->hasMany('App\Transaction');
    }

}

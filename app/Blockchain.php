<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blockchain extends Model
{
    protected $fillable = [
        'difficulty', 'type'
    ];


    /**
     * Create the first block of the Blockchain.
     */
    public function createGenesisBlock()
    {

        $args = [
            'blockchain_id' => $this->id,
            'nonce' => 0,
            'data' => json_encode('Genesis'),
            'previous_hash' => 0,
        ];

        $hash = $this->createHash($args);

        while (!$this->isValidHashDifficulty($hash)) {
            $args['nonce']++;
            $hash = $this->createHash($args);
        }

        $args['hash'] = $hash;

        $this->storeBlock($args);

        return true;
    }

    /**
     * Create new Block.
     */
    public function newBlock($args)
    {   
        $args['nonce'] = 0;
        $args['previous_hash'] = $this->latestBlockHash();

        $hash = $this->createHash($args);

        while (!$this->isValidHashDifficulty($hash)) {
            $args['nonce']++;
            $hash = $this->createHash($args);
        }

        $args['hash'] = $hash;

        $this->storeBlock($args);

        return true;
    }

    /**
     * Store new Block.
     */
    public function storeBlock($args)
    {  
        $block = new Block;

        $block->blockchain_id   = $args['blockchain_id'];
        $block->nonce           = $args['nonce'];
        $block->data            = $args['data'];
        $block->previous_hash   = $args['previous_hash'];
        $block->hash            = $args['hash'];

        $block->save();

        dd($block);

        return true;
    }

    /**
     * Check if the hash difficulty is valid.
     */
    public function isValidHashDifficulty($hash)
    {
        $hashArray = str_split($hash);

        for ($i = 0; $i < count($hashArray) - 1; $i++) {
          if ($hashArray[$i] !== "0") {
            break;
          }
        }

        return $i >= $this->difficulty;
    }

    /**
     * Take args and make a new hash
     */
    public function createHash($args)
    {
        $unHashed = $args['blockchain_id'] . $args['data'] . $args['previous_hash'] . $args['nonce'];
        return hash('sha256', $unHashed);
    }

    /**
     * Gets the latest Block of the Blockchain.
     */
    public function latestBlock() 
    {
        $lastBlock = Block::latest()->first();
        return $lastBlock;
    }

    /**
     * Gets the latest Block hash.
     */
    public function latestBlockHash() 
    {
        $lastBlock = Block::latest()->first();
        return $lastBlock->hash;
    }

    /**
     * Get the blocks of the blockchain.
     */
    public function blocks()
    {
        return $this->hasMany('App\Block');
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blockchain extends Model
{
    protected $fillable = [
        'version', 'difficulty', 'type'
    ];

    /**
     * Create the first block of the Blockchain.
     */
    public function createGenesisBlock()
    {
        $block = [
            'blockchain_id' => $this->id,
            'nonce' => 0,
            'height' => 0,
            'previous_hash' => 0,
            'hash' => 0,
            'status' => 'not_mined',
        ];
        $block = $this->storeBlock($block);

        $transaction = [
            'block_id' => $block->id,
            'hash' => 0,
            'data' => '["Genesis Block"]',
        ];
        $transaction = $this->storeTransaction($transaction);

        return true;
    }

    public function storeBlock($args)
    {
        $block = new Block;
        $block->blockchain_id   = $args['blockchain_id'];
        $block->nonce           = $args['nonce'];
        $block->height          = $args['height'];
        $block->previous_hash   = $args['previous_hash'];
        $block->hash            = $args['hash'];
        $block->status          = $args['status'];
        $block->save();

        return $block;
    }

    public function storeTransaction($args)
    {
        $transaction = new Transaction;
        $transaction->block_id        = $args['block_id'];
        $transaction->hash            = $args['hash'];
        $transaction->data            = $args['data'];
        $transaction->save();

        return $transaction;
    }

    public function createTransaction($data)
    {
        $transaction = [
            'block_id' => $this->findOrCreateNotMinedBlock(),
            'hash'     => 0,
            'data'     => $data,
        ];

        $transaction = $this->storeTransaction($transaction);

        dd($transaction);

        return $transaction;
    }

    public function findOrCreateNotMinedBlock()
    {
        $block = Block::where('status', 'not_mined')->first();

        if (!$block) {
            $block = $this->createBlock();
        }

        return $block->id;
    }

    public function createBlock()
    {
        $args = [
            'blockchain_id' => $this->id,
            'nonce'         => 0,
            'height'        => 0,
            'hash'          => 0,
            'previous_hash' => 0,
            'status'        => 'not_mined',
        ];

        $block = $this->storeBlock($args);

        return $block;
    }

    // /**
    //  * Create new Block.
    //  */
    // public function newBlock($args)
    // {   
    //     // if (!$this->isChainValid()) {
    //     //     return false;
    //     // }

    //     $args['nonce'] = 0;
    //     $args['previous_hash'] = $this->latestBlockHash();

    //     $args['hash'] = $this->createHash($args);

    //     $this->storeBlock($args);

    //     return true;
    // }

    // /**
    //  * Store new Block.
    //  */
    // public function storeBlock($args)
    // {  
    //     $block = new Block;

    //     $block->blockchain_id   = $args['blockchain_id'];
    //     $block->nonce           = $args['nonce'];
    //     $block->data            = $args['data'];
    //     $block->previous_hash   = $args['previous_hash'];
    //     $block->hash            = $args['hash'];

    //     $block->save();

    //     dd($block);

    //     return true;
    // }

    // /**
    //  * Check if the hash difficulty is valid.
    //  */
    // public function isValidHashDifficulty($hash)
    // {
    //     $hashArray = str_split($hash);

    //     for ($i = 0; $i < count($hashArray) - 1; $i++) {
    //       if ($hashArray[$i] !== "0") {
    //         break;
    //       }
    //     }

    //     return $i >= $this->difficulty;
    // }

    // /**
    //  * Take args and make a new hash
    //  */
    // public function createHash($args)
    // {
    //     $unHashed = $args['blockchain_id'] . $args['data'] . $args['previous_hash'] . $args['nonce'];
    //     $hash = hash('sha256', $unHashed);

    //     while (!$this->isValidHashDifficulty($hash)) {
    //         $args['nonce']++;
    //         $hash = $this->createHash($args);
    //     }

    //     return $hash;
    // }

    // /**
    //  * Verify if the chain is valid
    //  */
    // public function isChainValid()
    // {  
    //     $blocks = $this->blocks()->latest()->get();

    //     foreach ($blocks as $block) {
    //         $predecessorBlock = $this->getPredecessorBlock($block);
    //         if ($block->previous_hash != $predecessorBlock->hash){
    //             return false;
    //         }
    //         if (!$this->isValidHashDifficulty($predecessorBlock->hash)){
    //             return false;
    //         }
    //         if (!$this->isValidHashDifficulty($block->hash)){
    //             return false;
    //         }
    //     }
    //     return true;
    // }

    // /**
    //  * Get the block - 1
    //  */
    // public function getPredecessorBlock(Block $block)
    // {  
    //     $predecessorBlock = Block::where('id', $block->id - 1)->first();
    //     return $predecessorBlock;
    // }

    // /**
    //  * Gets the latest Block of the Blockchain.
    //  */
    // public function latestBlock() 
    // {
    //     $lastBlock = Block::latest()->first();
    //     return $lastBlock;
    // }

    // /**
    //  * Gets the latest Block hash.
    //  */
    // public function latestBlockHash() 
    // {
    //     $lastBlock = Block::latest()->first();
    //     return $lastBlock->hash;
    // }

    /**
     * Get the blocks of the blockchain.
     */
    public function blocks()
    {
        return $this->hasMany('App\Block');
    }

    /**
     * Get the blocks of the blockchain.
     */
    public function projects()
    {
        return $this->hasMany('App\Project');
    }

}

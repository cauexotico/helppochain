<?php

namespace App\Services;

use App\Blockchain;

class BlockchainService
{

    // public function calculateHash()
    // {
    // }

    /**
     * Creates a new Block.
     */
    public function newBlock($args)
    {

    }

    /**
     * Find the correct nonce to match difficultty.
     */
    public function mineBlock($args)
    {
        //fazer aq nonce
    }

    /**
     * Check if the hash is Ok (Difficulty and if args makes the hash again).
     */
    public function isHashValid($args)
    {

    }

    /**
     * Check if the hash difficulty is valid.
     */
    public function isValidHashDifficulty(Block $block)
    {
        
    }

    /**
     * Check if the args of the previous block makes the hash again.
     */
    public function isPreviousBlockValid()
    {

    }

}

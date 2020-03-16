<?php

namespace App\Services;

use App\Transaction;

class TransactionService
{
    public function createTransaction($data, $apiKey) {
        $hash = new HashService::to256($data);
        $block = $this->findParentBlock($apiKey);
        
        // $transaction = new Transaction($hash, $block->id);
        // return $transaction;
    }

    public function findParentBlock($apiKey) {
        $project = new ProjectService::findProject($apiKey);
        
        $block = $project->latestBlock()
        if ( $block->status != pending ) {
            $block = new BlockService::newBlock();
        }

        return $block;
    }
}

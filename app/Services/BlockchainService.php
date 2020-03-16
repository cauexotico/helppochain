<?php

namespace App\Services;

use App\Blockchain;

class BlockchainService
{

	static function createBlockchain($type, $difficulty)
	{
		$blockchain = new Blockchain;
		$blockchain->version 	= '1';
		$blockchain->type 		= $type;
		$blockchain->difficulty = $difficulty;
		$blockchain->save();

		$blockchain->createGenesisBlock();		

		return $blockchain;
	}

}

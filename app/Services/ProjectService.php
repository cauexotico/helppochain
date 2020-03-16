<?php

namespace App\Services;

use App\Blockchain;
use App\Services\BlockchainService;

class ProjectService
{

	static function findOrCreateBlockchain($type, $difficulty)
	{
		$blockchain = Blockchain::where('type', $type)
			->where('difficulty', $difficulty)
			->inRandomOrder()
			->first();

		if (!$blockchain) {
			$blockchain = BlockchainService::createBlockchain($type, $difficulty);
		}

		return $blockchain->id;
	}

}

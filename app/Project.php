<?php

namespace App;

use Services\BlockService;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
	protected $fillable = [
        'name', 'type', 'blockchain_id', 'api_key', 'api_secret', 'start_version', 'current_version'
    ];

    /**
     * Get the blockchain of this block.
     */
    public function blockchain()
    {
        return $this->belongsTo('App\Blockchain');
    }

}

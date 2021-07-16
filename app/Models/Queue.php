<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Queue extends Model
{
   	protected $fillable = [
		'aircraft_id'
	];

	public function aircraft() {
        return $this->belongsTo(Aircraft::class);
	}
}

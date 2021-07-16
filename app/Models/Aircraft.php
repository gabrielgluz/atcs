<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Aircraft extends Model
{
	protected $table = 'aircrafts';
	public $timestamps = false;

   	protected $fillable = [
		'name',
		'type',
		'size'
	];

	protected $appends = ['type_priority', 'size_priority', 'enqueued_at', 'enqueued_at_formatted'];

    public function getTypePriorityAttribute() 
    {
    	if($this->type === 'Emergency')
    		return 1;

    	if($this->type === 'VIP')
    		return 2;

    	if($this->type === 'Passenger')
    		return 3;

    	if($this->type === 'Cargo')
    		return 4;
    }

    public function getSizePriorityAttribute() 
    {
    	if($this->size === 'Large')
    		return 1;

    	if($this->size === 'Small')
    		return 2;
    }

    public function getEnqueuedAtAttribute()
    {
        if(!empty($this->queue->created_at))
            return $this->queue->created_at;
    }

    public function getEnqueuedAtFormattedAttribute()
    {
        if(!empty($this->queue->created_at))
            return Carbon::parse($this->queue->created_at)->format('m/d/Y H:i:s');
    }

	public function queue() {
        return $this->hasOne(Queue::class);
	}
}

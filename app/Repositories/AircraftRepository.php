<?php

namespace App\Repositories;

use App\Models\Aircraft;

class AircraftRepository extends BaseRepository
{
	public function __construct(Aircraft $model)
	{
		$this->model = $model;
	}

    public function getEnqueued() {
        $aircrafts = $this->model->has('queue')->with('queue')->get()->toArray();
        return orderByQueuePriority($aircrafts);
    }

    public function getNotEnqueued() {
        $aircrafts = $this->model->whereDoesntHave('queue')->get()->toArray();
        return orderByQueuePriority($aircrafts);
    }

}

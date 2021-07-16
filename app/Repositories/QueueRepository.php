<?php

namespace App\Repositories;

use App\Models\Queue;
use App\Repositories\AircraftRepository;

class QueueRepository extends BaseRepository
{
    public function __construct(Queue $model = null) {
        if(empty($model))
            $this->model = new Queue;
        else
            $this->model = $model;
    }

    public function delete() {

        $aircraftRepository = new AircraftRepository();

        $enqueued = $aircraftRepository->getEnqueued();
        if(empty($enqueued))
            throw new \Exception("There are no enqueued aircrafts");
            
        $queueToDelete = reset($enqueued);

        $this->find($queueToDelete['queue']['id']);
        $this->model->forceDelete();

    }

}

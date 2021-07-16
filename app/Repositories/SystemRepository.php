<?php

namespace App\Repositories;

use App\Models\System;

class SystemRepository extends BaseRepository
{
    public function __construct(System $model = null) {
        if(empty($model))
            $this->model = new System;
        else
            $this->model = $model;
    }

    public function update($data) {
        $system = $this->first();
        if(empty($system)) 
            $system = $this->create(['online' => false]);

        $system->online = !$system->online;
        $system->save();

        return $system;
    }

}

<?php

namespace App\Repositories;

abstract class BaseRepository
{
    protected $model;

    public function find($id) {
    	$find = $this->model->find($id);
    	$this->model = $find;
    	return $find;
	}
	
    public function first() {
        return $this->model->first();
    }

	public function create($data) {
		return $this->model->create($data);
	}

	public function update($data) {
		if(empty($this->model))
			throw new \Exception("Model not instantiated");
			
		return $this->model->update($data);
	}

	public function delete() {
		if(empty($this->model))
			throw new \Exception("Model not instantiated");
			
		$this->model->forceDelete();
	}

}

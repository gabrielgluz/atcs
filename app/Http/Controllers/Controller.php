<?php

namespace App\Http\Controllers;

use App\Repositories\SystemRepository;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    
	protected function checkIfSystemIsOnline() {

		$systemRepository = new SystemRepository();
		$system = $systemRepository->first();

        if(empty($system)) {
            $system = new \stdClass();
            $system->online = false;
        }

        return $system->online;

	}

}

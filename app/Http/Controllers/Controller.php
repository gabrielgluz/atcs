<?php

namespace App\Http\Controllers;

use App\Repositories\SystemRepository;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    
	protected function checkIfSystemIsOnline() {

		$systemRepository = new SystemRepository();
		return $systemRepository->first()->online;

	}

}

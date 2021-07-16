<?php

namespace App\Http\Controllers;

use App\Repositories\SystemRepository;

class SystemController extends Controller
{
    private $systemRepository;

    public function __construct () 
    {
        $this->systemRepository = new SystemRepository();
    }

    public function get() {
    	$system = $this->systemRepository->first();
        if(empty($system)) {
            $system = new \stdClass();
            $system->online = false;
        }

        return response()->json([
            'label' => ($system->online ? 'Unplug System' : 'Boot System')
        ]);
    }

    public function boot()
    {
        try {
            
            $system = $this->systemRepository->update([]);

            return response()->json([
                'message' => ($system->online ? 'System is now On-line' : 'System is now Off-line')
            ]);

        } catch (\DomainException $e) {

            return response()->json([
                'message' => $e->getMessage(),
                'code' => $e->getCode()
            ]);

        }
    }

}

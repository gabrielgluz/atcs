<?php

namespace App\Http\Controllers;

use App\Repositories\AircraftRepository;
use App\Repositories\QueueRepository;
use Illuminate\Http\Request;

class QueuesController extends Controller
{
	private $queueRepository;
	private $aircraftRepository;

	public function __construct() {
		$this->queueRepository = new QueueRepository();
		$this->aircraftRepository = new AircraftRepository();
	}

	public function get()
	{
        $queue = $this->aircraftRepository->getEnqueued();

        return response()->json($queue);
	}

    public function enqueue(Request $request)
    {
        $this->validate($request, [
            'aircraft_id' => 'required',
        ]);

        try {

            if(!$this->checkIfSystemIsOnline())
                throw new \Exception("System if Offline! To enqueue Aircrafts you must turn the system on.");

            $this->queueRepository->create($request->all());
            return response()->json([
                'message' => 'Aircraft enqueued successfully'
            ]);

        } catch (\DomainException $e) {

            return response()->json([
                'message' => $e->getMessage(),
                'code' => $e->getCode()
            ]);

        }
    }

    public function dequeue() 
    {
        try {

            if(!$this->checkIfSystemIsOnline())
                throw new \Exception("System if Offline! To dequeue Aircrafts you must turn the system on.");
            
            $this->queueRepository->delete();        

            return response()->json([
                'message' => 'Aircraft dequeued successfully'
            ]);

        } catch (\DomainException $e) {

            return response()->json([
                'message' => $e->getMessage(),
                'code' => $e->getCode()
            ]);

        }

    }

}

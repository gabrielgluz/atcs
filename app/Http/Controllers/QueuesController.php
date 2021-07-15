<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QueuesController extends Controller
{
    public function create(Request $request)
    {
        $this->validate($request, [
            'aircraft_id' => 'required',
        ]);

        try {
            
            $queue = Queue::create($request->all());
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

    public function delete($id) 
    {

    }

}

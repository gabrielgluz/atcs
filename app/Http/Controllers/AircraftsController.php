<?php

namespace App\Http\Controllers;

use App\Repositories\AircraftRepository;
use App\Rules\Size;
use App\Rules\Type;
use Illuminate\Http\Request;

class AircraftsController extends Controller
{
    private $aircraftRepository;

    public function __construct () 
    {
        $this->aircraftRepository = new AircraftRepository();
    }

    public function get()
    {
        $aircrafts = $this->aircraftRepository->getNotEnqueued();

        return response()->json($aircrafts);
    }

    public function show($id)
    {
        $aircraft = $this->aircraftRepository->find($id);

        return response()->json($aircraft);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'type' => ['required', 'string', new Type],
            'size' => ['required', 'string', new Size]
        ]);

        try {
            if(!$this->checkIfSystemIsOnline())
                throw new \Exception("System if Offline! To create Aircrafts you must turn the system on.");
            
            $this->aircraftRepository->create($request->all());
            return response()->json([
                'message' => 'Aircraft created successfully'
            ]);

        } catch (\DomainException $e) {

            return response()->json([
                'message' => $e->getMessage(),
                'code' => $e->getCode()
            ]);

        }
    }

    public function update(Request $request, $id) 
    {
        $this->validate($request, [
            'name' => 'required',
            'type' => ['required', 'string', new Type],
            'size' => ['required', 'string', new Size]
        ]);

        try {
            if(!$this->checkIfSystemIsOnline())
                throw new \Exception("System if Offline! To update Aircrafts you must turn the system on.");
            
            $aircraft = $this->aircraftRepository->find($id);
            $aircraft->update($request->all());

            return response()->json([
                'message' => 'Aircraft updated successfully'
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
        try {
            if(!$this->checkIfSystemIsOnline())
                throw new \Exception("System if Offline! To delete Aircrafts you must turn the system on.");
            
            $aircraft = $this->aircraftRepository->find($id);
            $aircraft->delete();

            return response()->json([
                'message' => 'Aircraft removed successfully'
            ]);

        } catch (\DomainException $e) {

            return response()->json([
                'message' => $e->getMessage(),
                'code' => $e->getCode()
            ]);

        }

    }

}

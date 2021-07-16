<?php

namespace App\Http\Controllers;

use App\Models\Aircraft;
use App\Repositories\AircraftRepository;
use App\Rules\Size;
use App\Rules\Type;
use Illuminate\Http\Request;

class AircraftsController extends Controller
{
    private $aircraftRepository;

    public function __construct () 
    {
        $this->aircraftRepository = new AircraftRepository(new Aircraft);
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

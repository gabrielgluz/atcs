<?php

namespace App\Http\Controllers;

use App\Models\Aircraft;
use App\Rules\Size;
use App\Rules\Type;
use Illuminate\Http\Request;

class AircraftsController extends Controller
{

    public function get()
    {
        $aircrafts = Aircraft::whereDoesntHave('queue')->get()->toArray();
        $aircrafts = $this->array_orderby($aircrafts);

        return response()->json($aircrafts);
    }

    public function show($id)
    {
        $aircraft = Aircraft::find($id);

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
            
            $aircraft = Aircraft::create($request->all());
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
            
            $aircraft = Aircraft::find($id);
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
            
            $aircraft = Aircraft::find($id);
            $aircraft->forceDelete();

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

    private function array_orderby(&$array)
    {
        if(empty($array))
            return $array;
        
        foreach ($array as $key => $row) {
            $type_priority[$key] = $row['type_priority'];
            $size_priority[$key] = $row['size_priority'];
            $enqueued_at[$key] = $row['enqueued_at'];
        }

        array_multisort($type_priority, SORT_ASC, $size_priority, SORT_ASC, $enqueued_at, SORT_ASC,$array);

        return $array;
    }

}

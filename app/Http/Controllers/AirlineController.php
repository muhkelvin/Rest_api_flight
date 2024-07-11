<?php

namespace App\Http\Controllers;

use App\Models\Airline;
use App\Http\Resources\AirlineResource;
use Illuminate\Http\Request;

class AirlineController extends Controller
{
    public function index()
    {
        return AirlineResource::collection(Airline::paginate(10));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'class' => 'required|string|max:255',
        ]);

        try {
            $airline = Airline::create($request->all());

            return response()->json([
                'message' => 'Airline created successfully',
                'airline' => new AirlineResource($airline),
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to create airline',
                'error' => $e->getMessage(),
            ], 400);
        }
    }

    public function show(Airline $airline)
    {
        return new AirlineResource($airline);
    }

    public function update(Request $request, Airline $airline)
    {
        $request->validate([
            'name' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'class' => 'nullable|string|max:255',
        ]);

        try {
            $airline->update($request->all());

            return response()->json([
                'message' => 'Airline updated successfully',
                'airline' => new AirlineResource($airline),
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to update airline',
                'error' => $e->getMessage(),
            ], 400);
        }
    }

    public function destroy(Airline $airline)
    {
        try {
            $airline->delete();

            return response()->json([
                'message' => 'Airline deleted successfully',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to delete airline',
                'error' => $e->getMessage(),
            ], 400);
        }
    }
}

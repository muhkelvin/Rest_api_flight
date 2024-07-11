<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use App\Http\Resources\FlightResource;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    public function index()
    {
        return FlightResource::collection(Flight::paginate(10));
    }

    public function store(Request $request)
    {
        $request->validate([
            'destination_id' => 'required|exists:destinations,id',
            'airline_id' => 'required|exists:airlines,id',
            'departure_time' => 'required|date',
            'arrival_time' => 'required|date',
            'direct_flight' => 'required|boolean',
        ]);

        try {
            $flight = Flight::create($request->all());

            return response()->json([
                'message' => 'Flight created successfully',
                'flight' => new FlightResource($flight),
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to create flight',
                'error' => $e->getMessage(),
            ], 400);
        }
    }

    public function show(Flight $flight)
    {
        return new FlightResource($flight);
    }

    public function update(Request $request, Flight $flight)
    {
        $request->validate([
            'destination_id' => 'nullable|exists:destinations,id',
            'airline_id' => 'nullable|exists:airlines,id',
            'departure_time' => 'nullable|date',
            'arrival_time' => 'nullable|date',
            'direct_flight' => 'nullable|boolean',
        ]);

        try {
            $flight->update($request->all());

            return response()->json([
                'message' => 'Flight updated successfully',
                'flight' => new FlightResource($flight),
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to update flight',
                'error' => $e->getMessage(),
            ], 400);
        }
    }

    public function destroy(Flight $flight)
    {
        try {
            $flight->delete();

            return response()->json([
                'message' => 'Flight deleted successfully',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to delete flight',
                'error' => $e->getMessage(),
            ], 400);
        }
    }
}


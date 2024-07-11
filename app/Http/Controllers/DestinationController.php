<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Http\Resources\DestinationResource;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    public function index()
    {
        return DestinationResource::collection(Destination::paginate(10));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        try {
            $destination = Destination::create($request->all());

            return response()->json([
                'message' => 'Destination created successfully',
                'destination' => new DestinationResource($destination),
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to create destination',
                'error' => $e->getMessage(),
            ], 400);
        }
    }

    public function show(Destination $destination)
    {
        return new DestinationResource($destination);
    }

    public function update(Request $request, Destination $destination)
    {
        $request->validate([
            'name' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        try {
            $destination->update($request->all());

            return response()->json([
                'message' => 'Destination updated successfully',
                'destination' => new DestinationResource($destination),
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to update destination',
                'error' => $e->getMessage(),
            ], 400);
        }
    }

    public function destroy(Destination $destination)
    {
        try {
            $destination->delete();

            return response()->json([
                'message' => 'Destination deleted successfully',
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to delete destination',
                'error' => $e->getMessage(),
            ], 400);
        }
    }
}


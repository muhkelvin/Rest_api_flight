<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Http\Resources\BookingResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::paginate(10);
        return BookingResource::collection($bookings);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'flight_id' => 'required|exists:flights,id',
            'status' => 'required|boolean',
        ]);

        try {
            $booking = Booking::create($validatedData);

            return response()->json([
                'message' => 'Booking created successfully',
                'booking' => new BookingResource($booking),
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to create booking',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function show($id)
    {
        try {
            $booking = Booking::findOrFail($id);
            return new BookingResource($booking);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Booking not found',
                'error' => $e->getMessage(),
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'flight_id' => 'required|exists:flights,id',
            'status' => 'required|boolean',
        ]);

        try {
            $booking = Booking::findOrFail($id);
            $booking->update($validatedData);

            return response()->json([
                'message' => 'Booking updated successfully',
                'booking' => new BookingResource($booking),
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Booking not found',
                'error' => $e->getMessage(),
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to update booking',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $booking = Booking::findOrFail($id);
            $booking->delete();

            return response()->json([
                'message' => 'Booking deleted successfully',
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Booking not found',
                'error' => $e->getMessage(),
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to delete booking',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}

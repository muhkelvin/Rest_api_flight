<?php

namespace App\Http\Controllers;

use App\Http\Resources\PaymentResource;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function profile()
    {
        return new UserResource(Auth::user());
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|string|email|max:255|unique:users,email,' . Auth::id(),
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        try {
            $user = Auth::user();
            $user->update([
                'name' => $request->input('name', $user->name),
                'email' => $request->input('email', $user->email),
                'password' => $request->filled('password') ? Hash::make($request->password) : $user->password,
            ]);

            return response()->json([
                'message' => 'Profile updated successfully',
                'user' => new UserResource($user),
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to update profile',
                'error' => $e->getMessage(),
            ], 400);
        }
    }

    public function history()
    {
        $user = Auth::user();
        // Assumed history includes bookings and payments
        return response()->json([
            'bookings' => BookingResource::collection($user->bookings),
            'payments' => PaymentResource::collection($user->payments),
        ]);
    }
}


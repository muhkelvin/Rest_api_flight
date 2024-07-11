<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Http\Resources\PaymentResource;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        return PaymentResource::collection(Payment::paginate(10));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'flight_id' => 'required|exists:flights,id',
            'amount' => 'required|numeric',
            'status' => 'required|boolean',
        ]);

        try {
            $payment = Payment::create($request->all());

            return response()->json([
                'message' => 'Payment created successfully',
                'payment' => new PaymentResource($payment),
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to create payment',
                'error' => $e->getMessage(),
            ], 400);
        }
    }

    public function show(Payment $payment)
    {
        return new PaymentResource($payment);
    }

    public function update(Request $request, Payment $payment)
    {
        $request->validate([
            'user_id' => 'nullable|exists:users,id',
            'flight_id' => 'nullable|exists:flights,id',
            'amount' => 'nullable|numeric',
            'status' => 'nullable|boolean',
        ]);

        try {
            $payment->update($request->all());

            if ($request->status === true) {
                // Logika untuk mengirim email konfirmasi pembayaran berhasil
                // \Mail::to($payment->user->email)->send(new PaymentConfirmedMail($payment));
            }

            return response()->json([
                'message' => 'Payment updated successfully',
                'payment' => new PaymentResource($payment),
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to update payment',
                'error' => $e->getMessage(),
            ], 400);
        }
    }

    public function destroy(Payment $payment)
    {
        try {
            $payment->delete();

            return response()->json([
                'message' => 'Payment deleted successfully',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to delete payment',
                'error' => $e->getMessage(),
            ], 400);
        }
    }
}

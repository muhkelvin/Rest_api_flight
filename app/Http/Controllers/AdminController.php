<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Http\Resources\PaymentResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AdminController extends Controller
{
    public function confirmPayment($id)
    {
        try {
            $payment = Payment::findOrFail($id);

            // Assuming 'status' being true means the payment is confirmed
            $payment->update(['status' => true]);

            return response()->json([
                'message' => 'Payment confirmed successfully',
                'payment' => new PaymentResource($payment),
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Payment not found',
                'error' => $e->getMessage(),
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to confirm payment',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}

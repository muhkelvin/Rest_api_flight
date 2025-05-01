<?php

namespace App\Http\Controllers\Api\Documentation;

use App\Http\Controllers\Controller;
use OpenApi\Annotations as OA;

class PaymentDoc extends Controller
{
    /**
     * @OA\Post(
     *     path="/api/payments",
     *     tags={"Payments"},
     *     summary="Buat transaksi pembayaran",
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/PaymentRequest")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Pembayaran berhasil dibuat"
     *     )
     * )
     */
    public function store() {}

    /**
     * @OA\Put(
     *     path="/api/payments/{payment}",
     *     tags={"Payments"},
     *     summary="Update status pembayaran",
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="payment",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Pembayaran berhasil diupdate"
     *     )
     * )
     */
    public function update() {}
}

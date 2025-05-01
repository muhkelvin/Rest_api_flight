<?php

namespace App\Http\Controllers\Api\Documentation;

use App\Http\Controllers\Controller;
use OpenApi\Annotations as OA;

class BookingDoc extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/bookings",
     *     tags={"Bookings"},
     *     summary="Get semua booking user",
     *     security={{"bearerAuth":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="Daftar booking",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Booking")
     *         )
     *     )
     * )
     */
    public function index() {}

    /**
     * @OA\Post(
     *     path="/api/bookings",
     *     tags={"Bookings"},
     *     summary="Buat booking baru",
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/BookingRequest")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Booking berhasil dibuat"
     *     )
     * )
     */
    public function store() {}
}

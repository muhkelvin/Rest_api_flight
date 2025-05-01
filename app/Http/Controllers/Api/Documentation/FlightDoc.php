<?php

namespace App\Http\Controllers\Api\Documentation;

use App\Http\Controllers\Controller;
use OpenApi\Annotations as OA;

class FlightDoc extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/flights",
     *     tags={"Flights"},
     *     summary="Get semua jadwal penerbangan",
     *     @OA\Parameter(
     *         name="destination_id",
     *         in="query",
     *         description="Filter by destinasi",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Daftar penerbangan",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Flight")
     *         )
     *     )
     * )
     */
    public function index() {}

    /**
     * @OA\Post(
     *     path="/api/flights",
     *     tags={"Flights"},
     *     summary="Buat jadwal penerbangan baru",
     *     security={{"bearerAuth":{}}, {"admin":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/FlightRequest")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Jadwal penerbangan berhasil dibuat"
     *     )
     * )
     */
    public function store() {}
}

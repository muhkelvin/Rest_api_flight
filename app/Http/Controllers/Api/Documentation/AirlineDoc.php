<?php

namespace App\Http\Controllers\Api\Documentation;

use App\Http\Controllers\Controller;
use OpenApi\Annotations as OA;

class AirlineDoc extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/airlines",
     *     tags={"Airlines"},
     *     summary="Daftar semua maskapai",
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Airline")
     *         )
     *     )
     * )
     */
    public function index() {}

    /**
     * @OA\Post(
     *     path="/api/airlines",
     *     tags={"Airlines"},
     *     summary="Buat maskapai baru",
     *     security={{"bearerAuth":{}}, {"adminAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/AirlineRequest")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Maskapai berhasil dibuat",
     *         @OA\JsonContent(ref="#/components/schemas/Airline")
     *     )
     * )
     */
    public function store() {}
}

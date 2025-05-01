<?php

namespace App\Http\Controllers\Api\Documentation;

use App\Http\Controllers\Controller;
use OpenApi\Annotations as OA;

class DestinationDoc extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/destinations",
     *     tags={"Destinations"},
     *     summary="Get semua destinasi",
     *     @OA\Response(
     *         response=200,
     *         description="Daftar destinasi",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Destination")
     *         )
     *     )
     * )
     */
    public function index() {}

    /**
     * @OA\Post(
     *     path="/api/destinations",
     *     tags={"Destinations"},
     *     summary="Buat destinasi baru",
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/DestinationRequest")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Destinasi berhasil dibuat"
     *     )
     * )
     */
    public function store() {}
}

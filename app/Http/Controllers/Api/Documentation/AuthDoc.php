<?php

namespace App\Http\Controllers\Api\Documentation;

use App\Http\Controllers\Controller;
use OpenApi\Annotations as OA;

/**
 * @OA\Info(
 *     title="Flight Booking API",
 *     version="1.0.0",
 *     description="API untuk manajemen pemesanan tiket penerbangan",
 *     @OA\Contact(email="support@flightapi.com")
 * )
 *
 * @OA\Server(url="http://localhost:8000", description="Local Server")
 *
 * @OA\SecurityScheme(
 *     securityScheme="bearerAuth",
 *     type="http",
 *     scheme="bearer",
 *     bearerFormat="JWT"
 * )
 *
 * @OA\SecurityScheme(
 *     securityScheme="adminAuth",
 *     type="apiKey",
 *     in="header",
 *     name="X-Admin-Key"
 * )
 */
class AuthDoc extends Controller
{
    /**
     * @OA\Post(
     *     path="/api/register",
     *     tags={"Authentication"},
     *     summary="Registrasi pengguna baru",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/UserRegister")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Registrasi berhasil",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="User registered successfully")
     *         )
     *     )
     * )
     */
    public function register() {}

    /**
     * @OA\Post(
     *     path="/api/login",
     *     tags={"Authentication"},
     *     summary="Login pengguna",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/UserLogin")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Login berhasil",
     *         @OA\JsonContent(ref="#/components/schemas/LoginResponse")
     *     )
     * )
     */
    public function login() {}
}

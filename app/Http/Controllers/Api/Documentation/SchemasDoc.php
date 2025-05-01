<?php

namespace App\Http\Controllers\Api\Documentation;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *      schema="User",
 *      type="object",
 *      required={"name","email"},
 *      @OA\Property(property="id", type="integer", example=1),
 *      @OA\Property(property="name", type="string", example="John Doe"),
 *      @OA\Property(property="email", type="string", format="email", example="user@example.com"),
 *      @OA\Property(property="preferences", type="string", nullable=true)
 *  )
 *
 * @OA\Schema(
 *     schema="UserRegister",
 *     required={"name","email","password"},
 *     @OA\Property(property="name", type="string", example="John Doe"),
 *     @OA\Property(property="email", type="string", format="email", example="user@example.com"),
 *     @OA\Property(property="password", type="string", format="password", example="password")
 * )
 *
 * @OA\Schema(
 *     schema="UserLogin",
 *     required={"email","password"},
 *     @OA\Property(property="email", type="string", format="email", example="user@example.com"),
 *     @OA\Property(property="password", type="string", format="password", example="password")
 * )
 *
 * @OA\Schema(
 *     schema="LoginResponse",
 *     @OA\Property(property="token", type="string", example="1|abcdef123456")
 * )
 *
 * @OA\Schema(
 *     schema="UserProfile",
 *     type="object",
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="name", type="string", example="John Doe"),
 *     @OA\Property(property="email", type="string", format="email", example="user@example.com"),
 *     @OA\Property(property="preferences", type="string", nullable=true, example="Window Seat")
 * )
 *
 * @OA\Schema(
 *     schema="Airline",
 *     required={"name"},
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="name", type="string", example="Garuda Indonesia"),
 *     @OA\Property(property="description", type="string", example="National Flag Carrier"),
 *     @OA\Property(property="class", type="string", example="Business")
 * )
 *
 * @OA\Schema(
 *     schema="AirlineRequest",
 *     required={"name"},
 *     @OA\Property(property="name", type="string", example="Garuda Indonesia"),
 *     @OA\Property(property="description", type="string", example="National Flag Carrier"),
 *     @OA\Property(property="class", type="string", example="Business")
 * )
 *
 * @OA\Schema(
 *     schema="Flight",
 *     required={"destination_id","airline_id","departure_time"},
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="destination_id", type="integer", example=1),
 *     @OA\Property(property="airline_id", type="integer", example=1),
 *     @OA\Property(property="departure_time", type="string", format="date-time", example="2024-03-20 08:00:00"),
 *     @OA\Property(property="arrival_time", type="string", format="date-time", example="2024-03-20 10:00:00"),
 *     @OA\Property(property="direct_flight", type="boolean", example=true)
 * )
 *
 * @OA\Schema(
 *     schema="FlightRequest",
 *     required={"destination_id","airline_id","departure_time"},
 *     @OA\Property(property="destination_id", type="integer", example=1),
 *     @OA\Property(property="airline_id", type="integer", example=1),
 *     @OA\Property(property="departure_time", type="string", format="date-time", example="2024-03-20 08:00:00"),
 *     @OA\Property(property="arrival_time", type="string", format="date-time", example="2024-03-20 10:00:00"),
 *     @OA\Property(property="direct_flight", type="boolean", example=true)
 * )
 *
 * @OA\Schema(
 *     schema="Destination",
 *     required={"name"},
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="name", type="string", example="Paris"),
 *     @OA\Property(property="description", type="string", example="City of Light")
 * )
 *
 * @OA\Schema(
 *     schema="DestinationRequest",
 *     required={"name"},
 *     @OA\Property(property="name", type="string", example="Paris"),
 *     @OA\Property(property="description", type="string", example="City of Light")
 * )
 *
 * @OA\Schema(
 *     schema="Booking",
 *     required={"flight_id"},
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="user_id", type="integer", example=1),
 *     @OA\Property(property="flight_id", type="integer", example=1),
 *     @OA\Property(property="status", type="string", example="pending"),
 *     @OA\Property(property="created_at", type="string", format="date-time", example="2024-03-19 15:00:00")
 * )
 *
 * @OA\Schema(
 *     schema="BookingRequest",
 *     required={"flight_id"},
 *     @OA\Property(property="flight_id", type="integer", example=1),
 *     @OA\Property(property="status", type="string", example="pending")
 * )
 *
 * @OA\Schema(
 *     schema="Payment",
 *     required={"user_id","flight_id","amount"},
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="user_id", type="integer", example=1),
 *     @OA\Property(property="flight_id", type="integer", example=1),
 *     @OA\Property(property="amount", type="number", format="float", example=250.50),
 *     @OA\Property(property="status", type="string", example="pending"),
 *     @OA\Property(property="created_at", type="string", format="date-time", example="2024-03-19 15:30:00")
 * )
 *
 * @OA\Schema(
 *     schema="PaymentRequest",
 *     required={"flight_id","amount"},
 *     @OA\Property(property="flight_id", type="integer", example=1),
 *     @OA\Property(property="amount", type="number", format="float", example=500.75)
 * )
 */
class SchemasDoc {}

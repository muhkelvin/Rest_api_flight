<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FlightResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'destination_id' => $this->destination_id,
            'airline_id' => $this->airline_id,
            'departure_time' => $this->departure_time,
            'arrival_time' => $this->arrival_time,
            'direct_flight' => $this->direct_flight,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}

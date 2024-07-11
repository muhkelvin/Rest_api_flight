<?php

namespace Database\Factories;

use App\Models\Airline;
use App\Models\Destination;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Flight>
 */
class FlightFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'destination_id' => Destination::factory(),
            'airline_id' => Airline::factory(),
            'departure_time' => $this->faker->dateTimeBetween('+1 days', '+2 days'),
            'arrival_time' => $this->faker->dateTimeBetween('+3 days', '+4 days'),
            'direct_flight' => $this->faker->boolean,
        ];
    }
}

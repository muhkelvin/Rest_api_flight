<?php

namespace Database\Factories;

use App\Models\Flight;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => rand(1,5),
            'flight_id' => Flight::factory(),
            'amount' => $this->faker->randomFloat(2, 50, 1000),
            'status' => $this->faker->boolean,
        ];
    }
}

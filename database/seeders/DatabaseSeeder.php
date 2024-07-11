<?php

namespace Database\Seeders;

use App\Models\Airline;
use App\Models\Booking;
use App\Models\Destination;
use App\Models\Flight;
use App\Models\Payment;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */

        public function run()
    {
        // Create some users
        User::factory(5)->create();

        // Create some destinations
        Destination::factory(5)->create();

        // Create some airlines
        Airline::factory(3)->create();

        // Create some flights
        Flight::factory(10)->create();

        // Create some payments
        Payment::factory(20)->create();

        // Create some bookings
        Booking::factory(15)->create();
    }

}

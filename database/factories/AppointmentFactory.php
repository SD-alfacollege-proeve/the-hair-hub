<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appointment>
 */
class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           "customer_name" => fake()->name,
           "email" => fake()->email,
           "phone_number" => preg_replace('/\D/', '', fake()->phoneNumber()),
           "appointment_date" => fake()->dateTimeBetween("-4 weeks"),
           "user_id" => random_int(1,2),
           "treatment_id" => random_int(1,5),
        ];
    }
}

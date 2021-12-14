<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UserDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "user_id" => $this->faker->numberBetween($min = 1, $max = 10),
            'phoneNumber' => $this->faker->phoneNumber(),
            'field' => $this->faker->randomElement(['Family physicians', 'Cardiologists', 'Pediatricians', 'Anesthesiologists', 'Radiologists ', 'Internists', 'Neurologists ', 'Emergency physicians','Psychiatrists']),
        ];
    }
}

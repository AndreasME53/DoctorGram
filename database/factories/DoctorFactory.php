<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DoctorFactory extends Factory
{
    /**
     * Define the model's default state.
     * 'hospital_id' => $this->faker->numberBetween($min = 1, $max = 5),
     * @return array
     */
    public function definition()
    {
        return [
            'firstName' => $this->faker->firstName(),
            'lastName' => $this->faker->lastName(),
            'phoneNumber' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
           
        ];
    }
}

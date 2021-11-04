<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'firstName' => $this->faker->firstName(),
            'lastName' => $this->faker->lastName(),
            'phoneNumber' => $this->faker->phoneNumber,
            'address' => $this->faker->address(),
            'symptom' => $this->faker->sentence(),
            'insurenceNumber' => $this->faker->bankAccountNumber, // as the insurence number generator wasnt working
        ];
    }
}

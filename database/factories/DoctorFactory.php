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
            'hospital_name' => $this->faker->randomElement(["St Thomas' Hospital", "The London Clinic", "Whittington Hospital", "St Mary's Hospital", 'Allied Health Services', 'Care Medical Clinic', ' Community Health Service']),
            'hospital_address' => $this->faker->address(),
            'field' => $this->faker->randomElement(['Family physicians', 'Cardiologists', 'Pediatricians', 'Anesthesiologists', 'Radiologists ', 'Internists', 'Neurologists ', 'Emergency physicians','Psychiatrists']),
           
        ];
    }
}


'address' => $this->faker->address(),
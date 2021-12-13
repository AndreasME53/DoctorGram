<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => $this->faker->text(),
            'phoneNumber' => $this->faker->phoneNumber(),
            'hospital_name' => $this->faker->randomElement(["St Thomas' Hospital", "The London Clinic", "Whittington Hospital", "St Mary's Hospital", 'Allied Health Services', 'Care Medical Clinic', ' Community Health Service']),
            'hospital_address'=> $this->faker->address(),
            'field' => $this->faker->randomElement(['Family physicians', 'Cardiologists', 'Pediatricians', 'Anesthesiologists', 'Radiologists ', 'Internists', 'Neurologists ', 'Emergency physicians','Psychiatrists']),
           
        ];
    }

}
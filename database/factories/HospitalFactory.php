<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class HospitalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ward_name' => $this->faker->randomElement(['Critical care', 'General ward', 'Surgical intensive care Unit','Intensive Coronary Care Unit']),
            'hospital_name' => $this->faker->randomElement(['Allied Health Services', 'Care Medical Clinic', ' Community Health Service']),
            'address' => $this->faker->address(), 
        ];
    }
}
<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->realText($maxNbChars = 100, $indexSize = 2),
            'description' => $this->faker->realText($maxNbChars = 1000, $indexSize = 2),
           // 'photo' => $this->faker->image('public/storage/images',400,300),    need to get the factory to do this
            'user_id' => $this->faker->numberBetween($min = 1, $max = 10), // need to find a better way for this 
// for later if time            //'patient_id' => $this->faker->numberBetween($min = 1, $max = 10), // need to find a better way for this 
        ];
    }
}
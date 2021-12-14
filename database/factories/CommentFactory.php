<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'description' => $this->faker->realText($maxNbChars = 200, $indexSize = 2),
            'post_id' => $this->faker->numberBetween($min = 1, $max = 10), // need to find a better way for this 
            'user_id' => $this->faker->numberBetween($min = 1, $max = 10), // need to find a better way for this 
        ];
    }
}

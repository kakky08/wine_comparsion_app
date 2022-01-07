<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FolderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 4),
            'status' => $this->faker->numberBetween(1, 2),
            'name' => $this->faker->realText(10),
        ];
    }
}

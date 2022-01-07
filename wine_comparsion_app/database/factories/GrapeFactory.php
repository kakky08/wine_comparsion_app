<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GrapeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'grape' => $this->faker->realText(10),
            'value' => $this->faker->numberBetween(1, 100),
        ];
    }
}

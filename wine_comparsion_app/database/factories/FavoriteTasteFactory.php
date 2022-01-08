<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FavoriteTasteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'type_id' => $this->faker->numberBetween(1, 2),
            'taste' => $this->faker->numberBetween(1, 9),
            'favorite' => $this->faker->numberBetween(1, 9),
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->realText(20),
            'content' => $this->faker->realText(100),
            'type_id' => $this->faker->numberBetween(1, 2),
            'country_id' => $this->faker->numberBetween(1, 10),
            'grape_id' => $this->faker->numberBetween(1, 10),
            'country_taste' => $this->faker->numberBetween(1, 9),
            'grape_taste' => $this->faker->numberBetween(1, 9),
            'taste_category' => $this->faker->numberBetween(11, 99),
        ];
    }
}

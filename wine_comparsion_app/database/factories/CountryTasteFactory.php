<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CountryTasteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'country_id' => $this->faker->numberBetween(1, 10),
            'type_id' => $this->faker->numberBetween(1, 2),
            'taste' =>  $this->faker->numberBetween(1, 9),
        ];
    }
}

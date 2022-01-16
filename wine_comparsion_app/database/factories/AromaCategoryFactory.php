<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AromaCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'aroma_type' => $this->faker->realText(10),
        ];
    }
}

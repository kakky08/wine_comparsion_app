<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AromaSubcategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'aroma_category_id' => $this->faker->randomDigit(),
            'aroma_type' => $this->faker->realText(10),
        ];
    }
}

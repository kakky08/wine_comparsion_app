<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FurtherSubcategoryFactory extends Factory
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
            'aroma_subcategory_id' => $this->faker->randomDigit(),
        ];
    }
}

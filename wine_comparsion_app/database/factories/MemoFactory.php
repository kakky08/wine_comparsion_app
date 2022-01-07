<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MemoFactory extends Factory
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
            'folder_id' => $this->faker->numberBetween(1, 10),
            'country_id' => $this->faker->numberBetween(1, 10),
            'type_id' => $this->faker->numberBetween(1, 2),
            'grape_id' => $this->faker->numberBetween(1, 10),
            'aroma_category_id' => $this->faker->numberBetween(1, 10),
            'name' => $this->faker->realText(20),
            'content' => $this->faker->realText(100),
            'comprehensive_evaluation' => $this->faker->numberBetween(1, 5),
            "flavor" => $this->faker->numberBetween(1, 5),
            'bitter_taste' => $this->faker->numberBetween(1, 5),
            'afterglow' => $this->faker->numberBetween(1, 5),
            'taste' => $this->faker->numberBetween(1, 5),
            'bodied' => $this->faker->numberBetween(1, 5),
            'sweet_taste' => $this->faker->numberBetween(1, 5),
            'fruit_taste' => $this->faker->numberBetween(1, 5),
            'acidity_taste' => $this->faker->numberBetween(1, 5),
        ];
    }
}

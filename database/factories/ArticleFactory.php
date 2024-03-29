<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'              => $this->faker->words(5, true),
            'short_description' => $this->faker->sentence(),
            'description'       => $this->faker->paragraph(5, false),
            'url'               => $this->faker->unique()->domainWord(),
            'status'            => $this->faker->boolean(),
        ];
    }
}

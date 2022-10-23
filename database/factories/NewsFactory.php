<?php

namespace Database\Factories;

use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'owner_id'          => Role::admins()->first(),
            'name'              => $this->faker->words(5, true),
            'description'       => $this->faker->paragraph(10, false),
            'url'               => $this->faker->unique()->domainWord(),
            'status'            => $this->faker->boolean(),
        ];
    }
}

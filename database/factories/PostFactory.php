<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition()
    {
        return [
            'title' => $this->faker->sentence(6),
            'body' => $this->faker->sentence(20),
            'tag' => $this->faker->sentence(4),
            'status' => 1,
            'created_by' => 1,
            'category_id' => 1,
            'thumbnail' => 'demo.jpg'
        ];
    }

}

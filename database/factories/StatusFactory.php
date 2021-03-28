<?php

namespace Database\Factories;

use App\Models\Status;
use Illuminate\Database\Eloquent\Factories\Factory;

class StatusFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Status::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->randomElement(['published', 'team', 'draft']),
            'description' => $this->faker->randomElement(['description published', 'description team', 'description draft']),
            'slug' => $this->faker->randomElement(['published', 'team', 'draft']),
        ];
    }
}

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
            'name' => $this->faker->unique()->randomElement(['public', 'team', 'private']),
            'description' => $this->faker->unique()->randomElement(['post as public', 'post as team', 'post as private']),
            'slug' => $this->faker->randomElement(['public', 'team', 'private']),
        ];
    }
}

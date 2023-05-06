<?php

namespace Database\Factories\MongoDB;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MongoDB\TaskMongo>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->title(),
            'status' => fake()->boolean(),
            'uniq_code' => '3ld7_&F!4h'
        ];
    }
}

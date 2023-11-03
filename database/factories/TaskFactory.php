<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Task;

class TaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Task::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => 'Task ' . Str::random(5),
            'description' => 'Change the world ' . Str::random(10),
            'is_done' => $this->faker->boolean,
            'user_id' => \App\Models\User::factory(),
        ];
    }
}

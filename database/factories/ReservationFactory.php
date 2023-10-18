<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Reservation;
use App\Models\Table;
use App\Models\User;

class ReservationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Reservation::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'table_id' => Table::factory(),
            'user_id' => User::factory(),
            'approvedby_id' => User::factory(),
            'approved_at' => $this->faker->dateTime(),
            'arrival_date' => $this->faker->dateTime(),
            'departure_date' => $this->faker->dateTime(),
            'status' => $this->faker->randomElement(["pending","accepted","rejected"]),
            'note' => $this->faker->text,
        ];
    }
}

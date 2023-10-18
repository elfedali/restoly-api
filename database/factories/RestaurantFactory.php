<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Currency;
use App\Models\District;
use App\Models\Restaurant;
use App\Models\User;

class RestaurantFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Restaurant::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'owner_id' => User::factory(),
            'district_id' => District::factory(),
            'address' => $this->faker->word,
            'approvedby_id' => User::factory(),
            'name' => '{}',
            'slug' => $this->faker->slug,
            'description' => '{}',
            'is_active' => $this->faker->boolean,
            'longitude' => $this->faker->longitude,
            'latitude' => $this->faker->latitude,
            'currency_id' => Currency::factory(),
            'meta_title' => '{}',
            'meta_description' => '{}',
            'meta_keywords' => '{}',
        ];
    }
}

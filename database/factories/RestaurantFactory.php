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
        $users = User::all()->pluck('id')->toArray();
        return [
            'owner_id' => $this->faker->randomElement($users),
            //'district_id' => District::factory(),
            'address' => $this->faker->word,
            'approvedby_id' => $this->faker->randomElement($users),
            'createdby_id' => $this->faker->randomElement($users),
            'name' => $this->faker->word . ' ' . $this->faker->randomElement(['Food', 'Cafe', 'Place', 'Restaurant', 'Bistro', 'Grill', 'Diner', 'Canteen', 'Eatery', 'Joint', 'Cafeteria', 'Brasserie', 'Pub', 'Tavern', 'Saloon', 'Steakhouse', 'Osteria', 'Pizzeria', 'Trattoria', 'Café', 'Coffee Shop', 'Coffee House', 'Tea Room', 'Deli', 'Deli', 'Doughnut Shop', 'Fast Food Restaurant', 'Hamburger Restaurant', 'Ice Cream Parlor', 'Sandwich Shop', 'Snack Bar', 'Sub Shop']),
            'slug' => $this->faker->slug . '-' . Str::random(5),
            'description' => $this->faker->text,
            'is_active' => $this->faker->boolean,
            'longitude' => $this->faker->longitude,
            'latitude' => $this->faker->latitude,
            'currency_id' => Currency::factory(),
            'meta_title' => $this->faker->word,
            'meta_description' => $this->faker->text,
            'meta_keywords' => $this->faker->word,
        ];
    }
}

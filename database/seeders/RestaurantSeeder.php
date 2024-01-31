<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        \App\Models\Restaurant::factory()
            ->count(100)->create()
            ->each(function ($restaurant) {
                $menu = \App\Models\Menu::factory()->create([
                    'restaurant_id' => $restaurant->id,
                ]);
                $menuCategories = \App\Models\MenuCategory::factory()
                    ->count(5)
                    ->create([
                        'menu_id' => $menu->id,
                    ])
                    ->each(function ($menuCategory) {
                        $menuItems = \App\Models\MenuItem::factory()
                            ->count(5)
                            ->create([
                                'menu_category_id' => $menuCategory->id,
                            ]);
                    });
                $reviews = \App\Models\Review::factory()
                    ->count(5)
                    ->create([
                        'reviewer_id' => \App\Models\User::inRandomOrder()->first()->id,
                        'reviewable_id' => $restaurant->id,
                        'reviewable_type' => \App\Models\Restaurant::class,

                    ]);
            });
    }
}

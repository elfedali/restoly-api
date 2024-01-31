<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\MenuCategory;
use App\Models\MenuItem;

class MenuItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MenuItem::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        $list_of_dishes = [
            "Cake",
            "Pie",
            "Cupcake",
            "Muffin",
            "Cheesecake",
            "Custard",
            "Pudding",
            "Cookie",
            "Biscuit",
            "Gingerbread", "Soufflé",
            "Crêpe",
            "Waffle",
            "Pancake",
            "Brownie",
            "Tart",
            "Cobbler",
            "Doughnut",
            "Ice Cream",
            "Frozen Yogurt",
            "Gelato",
            "Sherbet",
            "Sorbet",
            "Popsicle",
            "Fudge",
            "Toffee",
            "Caramel",
            "Candy Apple",
            "Cotton Candy",
            "Caramel Corn",
            "Candy Cane",
            "Chocolate Bar",
            "Chocolate Chip Cookie",
            "Chocolate Truffle",
            "Chocolate Mousse",
            "Chocolate Cake",
        ];
        return [
            'menu_category_id' => MenuCategory::factory(),
            'name' => $this->faker->randomElement($list_of_dishes),
            'price' => $this->faker->randomFloat(0, 0, 999.),
            'description' => $this->faker->words(5, true),
        ];
    }
}

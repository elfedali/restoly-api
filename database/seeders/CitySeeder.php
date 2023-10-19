<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // City::factory()->count(5)->create();
        // list of 5 cities morocco
        $list =  [
            [
                "name" => [
                    "ar" => "الدار البيضاء",
                    "en" => "Casablanca",
                    "fr" => "Casablanca",

                ],
                "country_id" => 1,
                "is_active" => true,

            ],
            [
                "name" => [
                    "ar" => "أكادير",
                    "en" => "Agadir",
                    "fr" => "Agadir",

                ],
                "country_id" => 1,
                "is_active" => true,

            ],

            [
                "name" => [
                    "ar" => "فاس",
                    "en" => "Fes",
                    "fr" => "Fes",

                ],
                "country_id" => 1,
                "is_active" => true,

            ],
            [
                "name" => [
                    "ar" => "مراكش",
                    "en" => "Marrakech",
                    "fr" => "Marrakech",

                ],
                "country_id" => 1,
                "is_active" => true,

            ],
            [
                "name" => [
                    "ar" => "طنجة",
                    "en" => "Tangier",
                    "fr" => "Tangier",

                ],
                "country_id" => 1,
                "is_active" => true,

            ],
        ];

        foreach ($list as $item) {
            $city = new City();
            $city->setTranslations('name', $item['name']);
            $city->country_id = $item['country_id'];
            $city->is_active = $item['is_active'];
            $city->save();
        }
    }
}

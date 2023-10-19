<?php

namespace Database\Seeders;

use App\Models\District;
use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //District::factory()->count(5)->create();

        // 5 biggest districts of Casablanca
        $list = [
            [
                "name" =>  [
                    "ar" => "المعاريف",
                    "en" => "Maarif",
                    "fr" => "Maarif",
                ],
                "is_active" => true,
                'city_id' => 1,
            ],

            [
                "name" =>  [
                    "ar" => "أنفا",
                    "en" => "Anfa",
                    "fr" => "Anfa",

                ],
                "is_active" => true,
                'city_id' => 1,
            ],
            [
                "name" =>  [
                    "ar" => "عين الشق",
                    "en" => "Ain Chock",
                    "fr" => "Ain Chock",
                ],
                "is_active" => true,
                'city_id' => 1,
            ],
            [
                "name" =>  [
                    "ar" => "الفداء-الحي الحسني",
                    "en" => "Fida-Mers Sultan",
                    "fr" => "Fida-Mers Sultan",
                ],
                "is_active" => true,
                'city_id' => 1,
            ],


            [
                "name" =>  [
                    "ar" => "مرس السلطان",
                    "en" => "Mers Sultan",
                    "fr" => "Mers Sultan",
                ],
                "is_active" => true,
                'city_id' => 1,
            ],
        ];

        foreach ($list as $item) {
            $new = new District();
            $new->setTranslations('name', $item['name']);
            $new->is_active = $item['is_active'] ?? false;
            $new->city_id = $item['city_id'];
            $new->save();
        }
    }
}

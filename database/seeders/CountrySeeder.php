<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $list =
            [
                [
                    "name" => [
                        "en" => "Morooco",
                        "ar" => "المغرب",
                        "fr" => "Maroc"
                    ],

                    "is_active" => true,
                ],
                [
                    "name" => [
                        "en" => "Egypt",
                        "ar" => "مصر",
                        "fr" => "Egypte"
                    ],

                    "is_active" => false,
                ],
            ];

        foreach ($list as $item) {
            $newCountry = new Country();
            $newCountry->setTranslations('name', $item['name']);
            $newCountry->is_active = $item['is_active'] ?? false;
            $newCountry->save();
        }
    }
}

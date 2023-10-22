<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $list = [
            [
                "name" => [
                    "en" => "Moroccan Dirham",
                    "ar" => "درهم مغربي",
                    "fr" => "Dirham marocain",
                ],

                "currency" => "mad",
                "symbol" => "DH",
                "is_active" => true,
            ],

            [
                "name" => [
                    "en" => "Euro",
                    "ar" => "اليورو",
                    "fr" => "Euro",
                ],
                "currency" => "eur",
                "symbol" => "€",
                "is_active" => false,
            ],
            [
                "name" => [
                    "en" => "Dollar",
                    "ar" => "دولار",
                    "fr" => "Dollar",
                ],
                "currency" => "usd",
                "symbol" => "$",
                "is_active" => false,
            ],
            [
                "name" => [
                    "en" => "Pound",
                    "ar" => "جنيه",
                    "fr" => "Livre",
                ],
                "currency" => "gbp",
                "symbol" => "£",
                "is_active" => false,
            ],
        ];

        foreach ($list as $item) {
            $newCurrency = new \App\Models\Currency();
            $newCurrency->setTranslations('name', $item['name']);
            $newCurrency->currency = $item['currency'];
            $newCurrency->symbol = $item['symbol'];
            $newCurrency->is_active = $item['is_active'] ?? false;
            $newCurrency->save();
        }
    }
}

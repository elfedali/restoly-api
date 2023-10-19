<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $list = [

            [
                "name" => [
                    "en" => "Chinese",
                    "ar" => "صيني",
                    "fr" => "Chinois"
                ],
                "is_active" => true,
            ],
            [
                "name" => [
                    "en" => "Italian",
                    "ar" => "إيطالي",
                    "fr" => "Italien"
                ],
                "is_active" => true,
            ],
            [
                "name" => [
                    "en" => "Japanese",
                    "ar" => "ياباني",
                    "fr" => "Japonais"

                ],
                "is_active" => false,
            ],
            [
                "name" => [
                    "en" => "Moroccan",
                    "ar" => "مغربي",
                    "fr" => "Marocain"
                ],
                "is_active" => true,
            ],


        ];

        foreach ($list as $item) {
            $newCategory = new Category();
            $newCategory->setTranslations('name', $item['name']);
            $newCategory->is_active = $item['is_active'] ?? false;
            $newCategory->save();
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $list = [
            [
                'name' => [
                    'en' => 'Delivery',
                    'ar' => 'توصيل',
                    'fr' => 'Livraison',
                ],

                'is_active' => true,
            ],
            [
                'name' => [
                    'en' => 'Takeaway',
                    'ar' => 'يأخذ بعيدا',
                    'fr' => 'Emporter',
                ],
                'is_active' => true,
            ],
            [
                'name' => [
                    'en' => 'Dine-in',
                    'ar' => 'تناول الطعام في المطعم',
                    'fr' => 'Dîner',
                ],
                'is_active' => true,
            ],
        ];

        foreach ($list as $item) {
            $service = new Service();
            $service->setTranslations('name', $item['name']);
            $service->is_active = $item['is_active'];
            $service->save();
        }
    }
}

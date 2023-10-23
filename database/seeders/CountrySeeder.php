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
                    'name' => [
                        'en' => 'Morocco',
                        'ar' => 'المغرب',
                        'fr' => 'Maroc'
                    ],

                    'is_active' => true,
                ],
                [
                    'name' => [
                        'en' => 'Egypt',
                        'ar' => 'مصر',
                        'fr' => 'Egypte'
                    ],

                    'is_active' => false,
                ],
                [
                    'name' => [
                        'en' => 'Tunisia',
                        'ar' => 'تونس',
                        'fr' => 'Tunisie'
                    ],

                    'is_active' => false,
                ],
                [
                    'name' => [
                        'en' => 'Algeria',
                        'ar' => 'الجزائر',
                        'fr' => 'Algérie'
                    ],

                    'is_active' => false,
                ],
                [
                    'name' => [
                        'en' => 'Saudi Arabia',
                        'ar' => 'المملكة العربية السعودية',
                        'fr' => 'Arabie saoudite'
                    ],

                    'is_active' => false,
                ],
                [
                    'name' => [
                        'en' => 'United Arab Emirates',
                        'ar' => 'الإمارات العربية المتحدة',
                        'fr' => 'Émirats arabes unis'
                    ],

                    'is_active' => false,
                ],
                [
                    'name' => [
                        'en' => 'Qatar',
                        'ar' => 'قطر',
                        'fr' => 'Qatar'
                    ],

                    'is_active' => false,
                ],
                [
                    'name' => [
                        'en' => 'Kuwait',
                        'ar' => 'الكويت',
                        'fr' => 'Koweït'
                    ],

                    'is_active' => false,
                ],
                [
                    'name' => [
                        'en' => 'Oman',
                        'ar' => 'عمان',
                        'fr' => 'Oman'
                    ],

                    'is_active' => false,
                ],
                [
                    'name' => [
                        'en' => 'Bahrain',
                        'ar' => 'البحرين',
                        'fr' => 'Bahreïn'
                    ],

                    'is_active' => false,
                ],
                [
                    'name' => [
                        'en' => 'Jordan',
                        'ar' => 'الأردن',
                        'fr' => 'Jordanie'
                    ],

                    'is_active' => false,
                ],
                [
                    'name' => [
                        'en' => 'Lebanon',
                        'ar' => 'لبنان',
                        'fr' => 'Liban'

                    ],

                    'is_active' => false,
                ],
                [
                    'name' => [
                        'en' => 'France',
                        'ar' => 'فرنسا',
                        'fr' => 'France'
                    ],
                    'is_active' => false
                ],
                [
                    'name' => [
                        'en' => 'Spain',
                        'ar' => 'إسبانيا',
                        'fr' => 'Espagne'
                    ],
                    'is_active' => false
                ],
                [
                    'name' => [
                        'en' => 'Italy',
                        'ar' => 'إيطاليا',
                        'fr' => 'Italie'
                    ],
                    'is_active' => false
                ],
                [
                    'name' => [
                        'en' => 'Germany',
                        'ar' => 'ألمانيا',
                        'fr' => 'Allemagne'
                    ],
                    'is_active' => false
                ],
                [
                    'name' => [
                        'en' => 'United Kingdom',
                        'ar' => 'المملكة المتحدة',
                        'fr' => 'Royaume-Uni'
                    ],
                    'is_active' => false
                ],

                [
                    'name' => [
                        'en' => 'United States',
                        'ar' => 'الولايات المتحدة',
                        'fr' => 'États-Unis'
                    ],
                    'is_active' => false
                ],
                [
                    'name' => [
                        'en' => 'Canada',
                        'ar' => 'كندا',
                        'fr' => 'Canada'
                    ],
                    'is_active' => false
                ],
                [
                    'name' => [
                        'en' => 'Australia',
                        'ar' => 'أستراليا',
                        'fr' => 'Australie'
                    ],
                    'is_active' => false
                ],
                [
                    'name' => [
                        'en' => 'Brazil',
                        'ar' => 'البرازيل',
                        'fr' => 'Brésil'
                    ],
                    'is_active' => false
                ],
                [
                    'name' => [
                        'en' => 'Russia',
                        'ar' => 'روسيا',
                        'fr' => 'Russie'
                    ],
                    'is_active' => false
                ],
                [
                    'name' => [
                        'en' => 'China',
                        'ar' => 'الصين',
                        'fr' => 'Chine'
                    ],
                    'is_active' => false
                ],
                [
                    "name" => [
                        'en' => 'Japan',
                        'ar' => 'اليابان',
                        'fr' => 'Japon'
                    ],
                    'is_active' => false
                ],
                [
                    "name" => [
                        'en' => 'India',
                        'ar' => 'الهند',
                        'fr' => 'Inde'
                    ],
                    'is_active' => false
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

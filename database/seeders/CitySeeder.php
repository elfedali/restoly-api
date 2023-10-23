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
        $list_morocco =  [
            [
                'name' => [
                    'ar' => 'الدار البيضاء',
                    'en' => 'Casablanca',
                    'fr' => 'Casablanca',

                ],
                'country_id' => 1,
                'is_active' => true,

            ],
            [
                'name' => [
                    'ar' => 'أكادير',
                    'en' => 'Agadir',
                    'fr' => 'Agadir',

                ],
                'country_id' => 1,
                'is_active' => true,

            ],

            [
                'name' => [
                    'ar' => 'فاس',
                    'en' => 'Fes',
                    'fr' => 'Fes',

                ],
                'country_id' => 1,
                'is_active' => true,

            ],
            [
                'name' => [
                    'ar' => 'مراكش',
                    'en' => 'Marrakech',
                    'fr' => 'Marrakech',

                ],
                'country_id' => 1,
                'is_active' => true,

            ],
            [
                'name' => [
                    'ar' => 'طنجة',
                    'en' => 'Tangier',
                    'fr' => 'Tangier',

                ],
                'country_id' => 1,
                'is_active' => true,

            ],
        ];

        $list_egypt = [
            [
                'name' => [
                    'ar' => 'القاهرة',
                    'en' => 'Cairo',
                    'fr' => 'Le Caire'
                ]
            ],
            [
                'name' => [
                    'ar' => 'الإسكندرية',
                    'en' => 'Alexandria',
                    'fr' => 'Alexandrie'
                ]
            ],
            [
                'name' => [
                    'ar' => 'الجيزة',
                    'en' => 'Giza',
                    'fr' => 'Gizeh'
                ]
            ],
            [
                'name' => [
                    'ar' => 'شبرا الخيمة',
                    'en' => 'Shubra El-Kheima',
                    'fr' => 'Shubra El-Kheima'
                ]
            ],
            [
                'name' => [
                    'ar' => 'المنصورة',
                    'en' => 'Mansoura',
                    'fr' => 'Mansoura'
                ]
            ]
        ];

        $list_france =
            [
                [
                    'name' => [
                        'ar' => 'باريس',
                        'en' => 'Paris',
                        'fr' => 'Paris'
                    ]
                ],
                [
                    'name' => [
                        'ar' => 'مرسيليا',
                        'en' => 'Marseille',
                        'fr' => 'Marseille'
                    ]
                ],
                [
                    'name' => [
                        'ar' => 'ليون',
                        'en' => 'Lyon',
                        'fr' => 'Lyon'
                    ]
                ],
                [
                    'name' => [
                        'ar' => 'تولوز',
                        'en' => 'Toulouse',
                        'fr' => 'Toulouse'
                    ]
                ],
                [
                    'name' => [
                        'ar' => 'نيس',
                        'en' => 'Nice',
                        'fr' => 'Nice'
                    ]
                ]
            ];
        $list_tunisia =
            [
                [
                    'name' => [
                        'ar' => 'تونس',
                        'en' => 'Tunis',
                        'fr' => 'Tunis'
                    ]
                ],
                [
                    'name' => [
                        'ar' => 'صفاقس',
                        'en' => 'Sfax',
                        'fr' => 'Sfax'
                    ]
                ],
                [
                    'name' => [
                        'ar' => 'سوسة',
                        'en' => 'Sousse',
                        'fr' => 'Sousse'
                    ]
                ],
                [
                    'name' => [
                        'ar' => 'قابس',
                        'en' => 'Gabes',
                        'fr' => 'Gabes'
                    ]
                ],
                [
                    'name' => [
                        'ar' => 'قفصة',
                        'en' => 'Gafsa',
                        'fr' => 'Gafsa'
                    ]
                ]
            ];

        $list_Algeria =
            [
                [
                    'name' => [
                        'ar' => 'الجزائر',
                        'en' => 'Algiers',
                        'fr' => 'Alger'
                    ]
                ],
                [
                    'name' => [
                        'ar' => 'وهران',
                        'en' => 'Oran',
                        'fr' => 'Oran'
                    ]
                ],
                [
                    'name' => [
                        'ar' => 'قسنطينة',
                        'en' => 'Constantine',
                        'fr' => 'Constantine'
                    ]
                ],
            ];

        $list_Saudi_Arabia =
            [
                [
                    'name' => [
                        'ar' => 'الرياض',
                        'en' => 'Riyadh',
                        'fr' => 'Riyadh'
                    ]
                ],
                [
                    'name' => [
                        'ar' => 'جدة',
                        'en' => 'Jeddah',
                        'fr' => 'Jeddah'
                    ]
                ],
                [
                    'name' => [
                        'ar' => 'مكة المكرمة',
                        'en' => 'Mecca',
                        'fr' => 'Mecca'
                    ]
                ],
            ];

        $list_United_Arab_Emirates =
            [
                [
                    'name' => [
                        'ar' => 'أبو ظبي',
                        'en' => 'Abu Dhabi',
                        'fr' => 'Abu Dhabi'
                    ]
                ],
                [
                    'name' => [
                        'ar' => 'دبي',
                        'en' => 'Dubai',
                        'fr' => 'Dubai'
                    ]
                ],
                [
                    'name' => [
                        'ar' => 'الشارقة',
                        'en' => 'Sharjah',
                        'fr' => 'Sharjah'
                    ]
                ],
            ];

        $list_Qatar =
            [
                [
                    'name' => [
                        'ar' => 'الدوحة',
                        'en' => 'Doha',
                        'fr' => 'Doha'
                    ]
                ],
                [
                    'name' => [
                        'ar' => 'الوكرة',
                        'en' => 'Al Wakrah',
                        'fr' => 'Al Wakrah'
                    ]
                ],
                [
                    'name' => [
                        'ar' => 'الخور',
                        'en' => 'Al Khor',
                        'fr' => 'Al Khor'
                    ]
                ],
            ];

        $list_Kuwait =
            [
                [
                    'name' => [
                        'ar' => 'الكويت',
                        'en' => 'Kuwait City',
                        'fr' => 'Kuwait City'
                    ]
                ],
                [
                    'name' => [
                        'ar' => 'الأحمدي',
                        'en' => 'Al Ahmadi',
                        'fr' => 'Al Ahmadi'
                    ]
                ],
                [
                    'name' => [
                        'ar' => 'حولي',
                        'en' => 'Hawalli',
                        'fr' => 'Hawalli'
                    ]
                ],
            ];

        $list_Oman =
            [
                [
                    'name' => [
                        'ar' => 'مسقط',
                        'en' => 'Muscat',
                        'fr' => 'Muscat'
                    ]
                ],
                [
                    'name' => [
                        'ar' => 'صلالة',
                        'en' => 'Salalah',
                        'fr' => 'Salalah'
                    ]
                ],
                [
                    'name' => [
                        'ar' => 'صحار',
                        'en' => 'Sohar',
                        'fr' => 'Sohar'
                    ]
                ],
            ];

        $list_Bahrain =
            [
                [
                    'name' => [
                        'ar' => 'المنامة',
                        'en' => 'Manama',
                        'fr' => 'Manama'
                    ]
                ],
                [
                    'name' => [
                        'ar' => 'المحرق',
                        'en' => 'Al Muharraq',
                        'fr' => 'Al Muharraq'
                    ]
                ],
                [
                    'name' => [
                        'ar' => 'الرفاع',
                        'en' => 'Riffa',
                        'fr' => 'Riffa'
                    ]
                ],
            ];

        $list_Jordan =
            [
                [
                    'name' => [
                        'ar' => 'عمان',
                        'en' => 'Amman',
                        'fr' => 'Amman'
                    ]
                ],
                [
                    'name' => [
                        'ar' => 'الزرقاء',
                        'en' => 'Zarqa',
                        'fr' => 'Zarqa'
                    ]
                ],
                [
                    'name' => [
                        'ar' => 'إربد',
                        'en' => 'Irbid',
                        'fr' => 'Irbid'
                    ]
                ],
            ];

        $list_Spain =
            [
                [
                    'name' => [
                        'ar' => 'مدريد',
                        'en' => 'Madrid',
                        'fr' => 'Madrid'
                    ]
                ],
                [
                    'name' => [
                        'ar' => 'برشلونة',
                        'en' => 'Barcelona',
                        'fr' => 'Barcelona'
                    ]
                ],
                [
                    'name' => [
                        'ar' => 'فالنسيا',
                        'en' => 'Valencia',
                        'fr' => 'Valencia'
                    ]
                ],
            ];

        $list_Italy =
            [
                [
                    'name' => [
                        'ar' => 'روما',
                        'en' => 'Rome',
                        'fr' => 'Rome'
                    ]
                ],
                [
                    'name' => [
                        'ar' => 'ميلانو',
                        'en' => 'Milan',
                        'fr' => 'Milan'
                    ]
                ],
                [
                    'name' => [
                        'ar' => 'نابولي',
                        'en' => 'Naples',
                        'fr' => 'Naples'
                    ]
                ],
            ];

        $list_Syria =
            [
                [
                    'name' => [
                        'ar' => 'دمشق',
                        'en' => 'Damascus',
                        'fr' => 'Damascus'
                    ]
                ],
                [
                    'name' => [
                        'ar' => 'حلب',
                        'en' => 'Aleppo',
                        'fr' => 'Aleppo'
                    ]
                ],
                [
                    'name' => [
                        'ar' => 'حمص',
                        'en' => 'Homs',
                        'fr' => 'Homs'
                    ]
                ],
            ];

        $list_Lebanon =
            [
                [
                    'name' => [
                        'ar' => 'بيروت',
                        'en' => 'Beirut',
                        'fr' => 'Beirut'
                    ]
                ],
                [
                    'name' => [
                        'ar' => 'طرابلس',
                        'en' => 'Tripoli',
                        'fr' => 'Tripoli'
                    ]
                ],
                [
                    'name' => [
                        'ar' => 'صيدا',
                        'en' => 'Sidon',
                        'fr' => 'Sidon'
                    ]
                ],
            ];

        $list_Iraq =
            [
                [
                    'name' => [
                        'ar' => 'بغداد',
                        'en' => 'Baghdad',
                        'fr' => 'Baghdad'
                    ]
                ],
                [
                    'name' => [
                        'ar' => 'البصرة',
                        'en' => 'Basra',
                        'fr' => 'Basra'
                    ]
                ],
                [
                    'name' => [
                        'ar' => 'الموصل',
                        'en' => 'Mosul',
                        'fr' => 'Mosul'
                    ]
                ],
            ];

        // Germany
        $list_Germany =
            [
                [
                    'name' => [
                        'ar' => 'برلين',
                        'en' => 'Berlin',
                        'fr' => 'Berlin'
                    ]
                ],
                [
                    'name' => [
                        'ar' => 'هامبورغ',
                        'en' => 'Hamburg',
                        'fr' => 'Hamburg'
                    ]
                ],
                [
                    'name' => [
                        'ar' => 'ميونخ',
                        'en' => 'Munich',
                        'fr' => 'Munich'
                    ]
                ],
            ];

        // United Kingdom

        $list_United_Kingdom =
            [
                [
                    'name' => [
                        'ar' => 'لندن',
                        'en' => 'London',
                        'fr' => 'London'
                    ]
                ],
                [
                    'name' => [
                        'ar' => 'بيرمنغهام',
                        'en' => 'Birmingham',
                        'fr' => 'Birmingham'
                    ]
                ],
                [
                    'name' => [
                        'ar' => 'ليدز',
                        'en' => 'Leeds',
                        'fr' => 'Leeds'
                    ]
                ],
            ];

        // canada   
        $list_Canada =
            [
                [
                    'name' => [
                        'ar' => 'تورونتو',
                        'en' => 'Toronto',
                        'fr' => 'Toronto'
                    ]
                ],
                [
                    'name' => [
                        'ar' => 'مونتريال',
                        'en' => 'Montreal',
                        'fr' => 'Montreal'
                    ]
                ],
                [
                    'name' => [
                        'ar' => 'فانكوفر',
                        'en' => 'Vancouver',
                        'fr' => 'Vancouver'
                    ]
                ],
            ];

        // Australia
        $list_Australia =
            [
                [
                    'name' => [
                        'ar' => 'سيدني',
                        'en' => 'Sydney',
                        'fr' => 'Sydney'
                    ]
                ],
                [
                    'name' => [
                        'ar' => 'ملبورن',
                        'en' => 'Melbourne',
                        'fr' => 'Melbourne'
                    ]
                ],
                [
                    'name' => [
                        'ar' => 'بريزبن',
                        'en' => 'Brisbane',
                        'fr' => 'Brisbane'
                    ]
                ],
            ];

        // Brazil

        $list_Brazil =
            [
                [
                    'name' => [
                        'ar' => 'ساو باولو',
                        'en' => 'Sao Paulo',
                        'fr' => 'Sao Paulo'
                    ]
                ],
                [
                    'name' => [
                        'ar' => 'ريو دي جانيرو',
                        'en' => 'Rio de Janeiro',
                        'fr' => 'Rio de Janeiro'
                    ]
                ],
                [
                    'name' => [
                        'ar' => 'سلفادور',
                        'en' => 'Salvador',
                        'fr' => 'Salvador'
                    ]
                ],
            ];

        // Russia

        $list_Russia =
            [
                [
                    'name' => [
                        'ar' => 'موسكو',
                        'en' => 'Moscow',
                        'fr' => 'Moscow'
                    ]
                ],
                [
                    'name' => [
                        'ar' => 'سانت بطرسبرغ',
                        'en' => 'Saint Petersburg',
                        'fr' => 'Saint Petersburg'
                    ]
                ],
                [
                    'name' => [
                        'ar' => 'نوفوسيبيرسك',
                        'en' => 'Novosibirsk',
                        'fr' => 'Novosibirsk'
                    ]
                ],
            ];

        //Japan
        $list_Japan =
            [
                [
                    'name' => [
                        'ar' => 'طوكيو',
                        'en' => 'Tokyo',
                        'fr' => 'Tokyo'
                    ]
                ],
                [
                    'name' => [
                        'ar' => 'كيوتو',
                        'en' => 'Kyoto',
                        'fr' => 'Kyoto'
                    ]
                ],
                [
                    'name' => [
                        'ar' => 'أوساكا',
                        'en' => 'Osaka',
                        'fr' => 'Osaka'
                    ]
                ],
            ];

        // india
        $list_India =
            [
                [
                    'name' => [
                        'ar' => 'مومباي',
                        'en' => 'Mumbai',
                        'fr' => 'Mumbai'
                    ]
                ],
                [
                    'name' => [
                        'ar' => 'دلهي',
                        'en' => 'Delhi',
                        'fr' => 'Delhi'
                    ]
                ],
                [
                    'name' => [
                        'ar' => 'بنغالور',
                        'en' => 'Bangalore',
                        'fr' => 'Bangalore'
                    ]
                ],
            ];

        $list_United_States  =
            [
                [
                    'name' => [
                        'ar' => 'نيويورك',
                        'en' => 'New York',
                        'fr' => 'New York'
                    ]
                ],
                [
                    'name' => [
                        'ar' => 'لوس أنجلوس',
                        'en' => 'Los Angeles',
                        'fr' => 'Los Angeles'
                    ]
                ],
                [
                    'name' => [
                        'ar' => 'شيكاغو',
                        'en' => 'Chicago',
                        'fr' => 'Chicago'
                    ]
                ],

                [
                    'name' => [
                        'ar' => 'هيوستن',
                        'en' => 'Houston',
                        'fr' => 'Houston'
                    ]
                ],
                [
                    'name' => [
                        'ar' => 'فيلادلفيا',
                        'en' => 'Philadelphia',
                        'fr' => 'Philadelphia'
                    ]
                ],
                [
                    'name' => [
                        'ar' => 'فينيكس',
                        'en' => 'Phoenix',
                        'fr' => 'Phoenix'
                    ],

                ],
                [
                    'name' => [
                        'ar' => 'سان أنطونيو',
                        'en' => 'San Antonio',
                        'fr' => 'San Antonio'
                    ]
                ],
                [
                    'name' => [
                        'ar' => 'سان دييغو',
                        'en' => 'San Diego',
                        'fr' => 'San Diego'
                    ]
                ],
                [
                    'name' => [
                        'ar' => 'دالاس',
                        'en' => 'Dallas',
                        'fr' => 'Dallas'
                    ]
                ],
                [
                    'name' => [
                        'ar' => 'سان خوسيه',
                        'en' => 'San Jose',
                        'fr' => 'San Jose'
                    ]
                ],
                [
                    'name' => [
                        'ar' => 'أوستن',
                        'en' => 'Austin',
                        'fr' => 'Austin'
                    ]
                ],
                [
                    'name' => [
                        'ar' => 'جاكسونفيل',
                        'en' => 'Jacksonville',
                        'fr' => 'Jacksonville'
                    ]
                ],
                [
                    'name' => [
                        'ar' => 'فورت وورث',
                        'en' => 'Fort Worth',
                        'fr' => 'Fort Worth'
                    ]
                ],
                [
                    'name' => [
                        'ar' => 'سان فرانسيسكو',
                        'en' => 'San Francisco',
                        'fr' => 'San Francisco'
                    ]
                ],
                [
                    'name' => [
                        'ar' => 'كولومبوس',
                        'en' => 'Columbus',
                        'fr' => 'Columbus'
                    ]
                ],
                [
                    'name' => [
                        'ar' => 'شارلوت',
                        'en' => 'Charlotte',
                        'fr' => 'Charlotte'
                    ]
                ],
                [
                    'name' => [
                        'ar' => 'فورت لودرديل',
                        'en' => 'Fort Lauderdale',
                        'fr' => 'Fort Lauderdale'
                    ]
                ],

            ];
        // get country id of Morocco
        $contry_morocco = \App\Models\Country::where('name->en', 'Morocco')->first();
        foreach ($list_morocco as $item) {
            $city = new City();
            $city->setTranslations('name', $item['name']);
            $city->country_id = $contry_morocco->id;
            $city->is_active = $item['is_active'];
            $city->save();
        }

        // get country id of Egypt
        $contry_egypt = \App\Models\Country::where('name->en', 'Egypt')->first();
        foreach ($list_egypt as $item) {
            $city = new City();
            $city->setTranslations('name', $item['name']);
            $city->country_id = $contry_egypt->id;
            $city->is_active = true;
            $city->save();
        }

        // get country id of France
        $contry_france = \App\Models\Country::where('name->en', 'France')->first();
        foreach ($list_france as $item) {
            $city = new City();
            $city->setTranslations('name', $item['name']);
            $city->country_id = $contry_france->id;
            $city->is_active = true;
            $city->save();
        }
        // get country id of Tunisia
        $contry_tunisia = \App\Models\Country::where('name->en', 'Tunisia')->first();
        foreach ($list_tunisia as $item) {
            $city = new City();
            $city->setTranslations('name', $item['name']);
            $city->country_id = $contry_tunisia->id;
            $city->is_active = true;
            $city->save();
        }

        // get country id of Algeria
        $contry_Algeria = \App\Models\Country::where('name->en', 'Algeria')->first();
        foreach ($list_Algeria as $item) {
            $city = new City();
            $city->setTranslations('name', $item['name']);
            $city->country_id = $contry_Algeria->id;
            $city->is_active = true;
            $city->save();
        }

        // get country id of Saudi Arabia
        $contry_Saudi_Arabia = \App\Models\Country::where('name->en', 'Saudi Arabia')->first();
        foreach ($list_Saudi_Arabia as $item) {
            $city = new City();
            $city->setTranslations('name', $item['name']);
            $city->country_id = $contry_Saudi_Arabia->id;
            $city->is_active = true;
            $city->save();
        }

        // get country id of United Arab Emirates
        $contry_United_Arab_Emirates = \App\Models\Country::where('name->en', 'United Arab Emirates')->first();
        foreach ($list_United_Arab_Emirates as $item) {
            $city = new City();
            $city->setTranslations('name', $item['name']);
            $city->country_id = $contry_United_Arab_Emirates->id;
            $city->is_active = true;
            $city->save();
        }

        // get country id of Qatar
        $contry_Qatar = \App\Models\Country::where('name->en', 'Qatar')->first();
        foreach ($list_Qatar as $item) {
            $city = new City();
            $city->setTranslations('name', $item['name']);
            $city->country_id = $contry_Qatar->id;
            $city->is_active = true;
            $city->save();
        }

        // get country id of Kuwait
        $contry_Kuwait = \App\Models\Country::where('name->en', 'Kuwait')->first();
        foreach ($list_Kuwait as $item) {
            $city = new City();
            $city->setTranslations('name', $item['name']);
            $city->country_id = $contry_Kuwait->id;
            $city->is_active = true;
            $city->save();
        }

        // get country id of Oman
        $contry_Oman = \App\Models\Country::where('name->en', 'Oman')->first();
        foreach ($list_Oman as $item) {
            $city = new City();
            $city->setTranslations('name', $item['name']);
            $city->country_id = $contry_Oman->id;
            $city->is_active = true;
            $city->save();
        }

        // get country id of Bahrain
        $contry_Bahrain = \App\Models\Country::where('name->en', 'Bahrain')->first();
        foreach ($list_Bahrain as $item) {
            $city = new City();
            $city->setTranslations('name', $item['name']);
            $city->country_id = $contry_Bahrain->id;
            $city->is_active = true;
            $city->save();
        }

        // get country id of Jordan
        $contry_Jordan = \App\Models\Country::where('name->en', 'Jordan')->first();
        foreach ($list_Jordan as $item) {
            $city = new City();
            $city->setTranslations('name', $item['name']);
            $city->country_id =  $contry_Jordan->id;
            $city->is_active = true;
            $city->save();
        }

        // get country id of Spain
        $contry_Spain = \App\Models\Country::where('name->en', 'Spain')->first();
        foreach ($list_Spain as $item) {
            $city = new City();
            $city->setTranslations('name', $item['name']);
            $city->country_id = $contry_Spain->id;
            $city->is_active = true;
            $city->save();
        }

        // get country id of Italy
        $contry_Italy = \App\Models\Country::where('name->en', 'Italy')->first();
        foreach ($list_Italy as $item) {
            $city = new City();
            $city->setTranslations('name', $item['name']);
            $city->country_id = $contry_Italy->id;
            $city->is_active = true;
            $city->save();
        }

        // get country id of Syria
        // $contry_Syria = \App\Models\Country::where('name->en', 'Syria')->first();
        // foreach ($list_Syria as $item) {
        //     $city = new City();
        //     $city->setTranslations('name', $item['name']);
        //     $city->country_id =$contry_Syria->id;
        //     $city->is_active = true;
        //     $city->save();
        // }

        // get country id of Lebanon
        $contry_Lebanon = \App\Models\Country::where('name->en', 'Lebanon')->first();
        foreach ($list_Lebanon as $item) {
            $city = new City();
            $city->setTranslations('name', $item['name']);
            $city->country_id = $contry_Lebanon->id;
            $city->is_active = true;
            $city->save();
        }

        // get country id of Iraq
        // $contry_Iraq = \App\Models\Country::where('name->en', 'Iraq')->first();
        // foreach ($list_Iraq as $item) {
        //     $city = new City();
        //     $city->setTranslations('name', $item['name']);
        //     $city->country_id =$contry_Iraq->id;
        //     $city->is_active = true;
        //     $city->save();
        // }

        // get country id of Germany
        $contry_Germany = \App\Models\Country::where('name->en', 'Germany')->first();
        foreach ($list_Germany as $item) {
            $city = new City();
            $city->setTranslations('name', $item['name']);
            $city->country_id = $contry_Germany->id;
            $city->is_active = true;
            $city->save();
        }

        // get country id of United Kingdom
        $contry_United_Kingdom = \App\Models\Country::where('name->en', 'United Kingdom')->first();
        foreach ($list_United_Kingdom as $item) {
            $city = new City();
            $city->setTranslations('name', $item['name']);
            $city->country_id = $contry_United_Kingdom->id;
            $city->is_active = true;
            $city->save();
        }

        // get country id of Canada
        $contry_Canada = \App\Models\Country::where('name->en', 'Canada')->first();
        foreach ($list_Canada as $item) {
            $city = new City();
            $city->setTranslations('name', $item['name']);
            $city->country_id = $contry_Canada->id;
            $city->is_active = true;
            $city->save();
        }

        // get country id of Australia
        $contry_Australia = \App\Models\Country::where('name->en', 'Australia')->first();
        foreach ($list_Australia as $item) {
            $city = new City();
            $city->setTranslations('name', $item['name']);
            $city->country_id = $contry_Australia->id;
            $city->is_active = true;
            $city->save();
        }

        // get country id of Brazil
        $contry_Brazil = \App\Models\Country::where('name->en', 'Brazil')->first();
        foreach ($list_Brazil as $item) {
            $city = new City();
            $city->setTranslations('name', $item['name']);
            $city->country_id = $contry_Brazil->id;
            $city->is_active = true;
            $city->save();
        }

        // get country id of Russia
        $contry_Russia = \App\Models\Country::where('name->en', 'Russia')->first();
        foreach ($list_Russia as $item) {
            $city = new City();
            $city->setTranslations('name', $item['name']);
            $city->country_id = $contry_Russia->id;
            $city->is_active = true;
            $city->save();
        }

        // get country id of Japan
        $contry_Japan = \App\Models\Country::where('name->en', 'Japan')->first();
        foreach ($list_Japan as $item) {
            $city = new City();
            $city->setTranslations('name', $item['name']);
            $city->country_id = $contry_Japan->id;
            $city->is_active = true;
            $city->save();
        }

        // get country id of India
        $contry_India = \App\Models\Country::where('name->en', 'India')->first();
        foreach ($list_India as $item) {
            $city = new City();
            $city->setTranslations('name', $item['name']);
            $city->country_id = $contry_India->id;
            $city->is_active = true;
            $city->save();
        }

        // get country id of United States
        $contry_United_States = \App\Models\Country::where('name->en', 'United States')->first();
        foreach ($list_United_States as $item) {
            $city = new City();
            $city->setTranslations('name', $item['name']);
            $city->country_id = $contry_United_States->id;
            $city->is_active = true;
            $city->save();
        }
    }
}

<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'first_name' => 'Abdessamad',
            'last_name' => 'fdl',
            'username' => 'abdessamad.fdl',
            'email' => 'webmaster@restoly.ma',
            'is_admin' => true,
            'role' => \App\Models\User::ROLE_ADMIN,
            'bio' => 'I am the admin of this website.',
        ]);

        $this->call(CategorySeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(CitySeeder::class);
        $this->call(DistrictSeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(CurrencySeeder::class);
    }
}

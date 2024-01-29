<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Task;
use Illuminate\Database\Seeder;
use PHPUnit\Event\Code\Test;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        \App\Models\User::factory()->create([
            'first_name' => 'Abdessamad',
            'last_name' => 'fdl',
            'username' => 'abdessamad.fdl',
            'email' => 'webmaster@restoly.ma',
            'is_admin' => true,
            'role' => \App\Models\User::ROLE_ADMIN,
            'bio' => 'Je suis le webmaster de ce site web.',
        ]);
        \App\Models\User::factory()->create([
            'first_name' => 'Safouan',
            'last_name' => 'fdl',
            'username' => 'safouan.fdl',
            'email' => 'commercial@restoly.ma',
            'is_admin' => true,
            'role' => \App\Models\User::ROLE_COMMERCIAL,
            'bio' => 'Je suis le commercial de ce site web.',
        ]);
        \App\Models\User::factory()->create([
            'first_name' => 'Mouad',
            'last_name' => 'ben',
            'username' => 'mouab.ben',
            'email' => 'mouad@restoly.ma',
            'is_admin' => true,
            'role' => \App\Models\User::ROLE_ADMIN,
            'bio' => 'Je suis le commercial de ce site web.',
        ]);

        \App\Models\User::factory(9)->create();

        $this->call(CategorySeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(CitySeeder::class);
        $this->call(DistrictSeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(CurrencySeeder::class);

        Task::factory()->count(10)->create();
    }
}

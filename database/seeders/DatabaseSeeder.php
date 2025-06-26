<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Company;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'id'=> 1,
            'name' => 'Super Admin',
            'email' => 'superadmin@example.com',
            'password' => bcrypt('SuperAdmin123'),
            'role' => 'superadmin',
            'company_id' => null,
        ]);

        Company::factory(5)->create();

    }
}

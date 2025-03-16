<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);

        $gestionnaireRole = Role::firstWhere('name', RoleEnum::GESTIONNAIRE->value);

        Login::factory(5)->create()->each(function (Login $login) {
            $login->assignRole($gestionnaireRole);
        });
        
        

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}

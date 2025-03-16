<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($RoleEnum::cases() as $roleEnum) {
            Role::create([
                'name' => $roleEnum->value,
            ]);
        }

        (Permission::create(['name' => 'astronaute-cards.*']))->assignRole(
            Role::firstWhere('name', RoleEnum::GESTIONNAIRE->value),
        );
    }
}

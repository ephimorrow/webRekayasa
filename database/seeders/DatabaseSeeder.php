<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            ProjectSeeder::class,
            ModuleSeeder::class,
            FileSeeder::class,
            LogSeeder::class,
            PermissionSeeder::class,
        ]);
    }
}

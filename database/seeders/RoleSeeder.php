<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        Role::create(['name' => 'Admin', 'description' => 'Administrator sistem']);
        Role::create(['name' => 'User', 'description' => 'Pengguna biasa']);
    }
}

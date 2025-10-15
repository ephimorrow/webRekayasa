<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;
use App\Models\Role;
use App\Models\Module;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        $adminRole = Role::where('name', 'Admin')->first();
        $userRole  = Role::where('name', 'User')->first();
        $module    = Module::first();

        Permission::create([
            'role_id' => $adminRole->id,
            'module_id' => $module->id,
            'can_read' => true,
            'can_write' => true,
            'can_delete' => true,
        ]);

        Permission::create([
            'role_id' => $userRole->id,
            'module_id' => $module->id,
            'can_read' => true,
            'can_write' => false,
            'can_delete' => false,
        ]);
    }
}

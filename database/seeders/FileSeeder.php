<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\File;
use App\Models\Module;
use App\Models\User;

class FileSeeder extends Seeder
{
    public function run(): void
    {
        $module = Module::first();
        $user = User::first();

        File::create([
            'module_id' => $module->id,
            'filename' => 'desain-awal.pdf',
            'path' => 'storage/files/desain-awal.pdf',
            'uploaded_by' => $user->id,
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Module;
use App\Models\Project;

class ModuleSeeder extends Seeder
{
    public function run(): void
    {
        $project1 = Project::first();

        Module::create([
            'project_id' => $project1->id,
            'name' => 'Frontend Interface',
            'description' => 'Membangun tampilan pengguna menggunakan Blade dan TailwindCSS',
            'status' => 'selesai',
        ]);

        Module::create([
            'project_id' => $project1->id,
            'name' => 'Backend API',
            'description' => 'Membuat REST API menggunakan Laravel untuk mengelola data proyek',
            'status' => 'proses',
        ]);
    }
}

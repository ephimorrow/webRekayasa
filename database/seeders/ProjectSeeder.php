<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\User;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::where('email', 'admin@example.com')->first();

        Project::create([
            'name' => 'Sistem Rekayasa Proyek A',
            'description' => 'Proyek awal untuk pengujian sistem',
            'start_date' => '2025-01-01',
            'end_date' => '2025-06-01',
            'status' => 'aktif',
            'created_by' => $admin->id,
        ]);

        Project::create([
            'name' => 'Sistem Monitoring Kinerja',
            'description' => 'Proyek backend Laravel untuk analisis kinerja tim',
            'start_date' => '2025-03-10',
            'end_date' => '2025-09-10',
            'status' => 'proses',
            'created_by' => $admin->id,
        ]);
    }
}

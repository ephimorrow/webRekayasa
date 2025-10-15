<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Log;
use App\Models\User;

class LogSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first();

        Log::create([
            'user_id' => $user->id,
            'action' => 'Login',
            'description' => 'User berhasil login ke sistem',
        ]);

        Log::create([
            'user_id' => $user->id,
            'action' => 'Tambah Proyek',
            'description' => 'User menambahkan proyek baru ke sistem',
        ]);
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('seminar', function (Blueprint $table) {
            $table->id('id_seminar');
            $table->string('judul');
            $table->text('deskripsi');
            $table->string('foto')->nullable();
            $table->enum('jenis', ['skripsi', 'workshop', 'umum']);
            $table->string('lokasi');
            $table->dateTime('waktu');
            $table->integer('kuota');
            $table->timestamps(); // created_at & updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('seminar');
    }
};

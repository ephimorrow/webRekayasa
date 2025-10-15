<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pendaftaran', function (Blueprint $table) {
            $table->id('id_pendaftaran');
            $table->enum('status', ['terdaftar', 'tidak terdaftar'])->default('tidak terdaftar');
            $table->unsignedBigInteger('id_seminar');
            $table->unsignedBigInteger('id_peserta');
            $table->timestamps(); // created_at & updated_at

            // Foreign Key
            $table->foreign('id_seminar')->references('id_seminar')->on('seminar')->onDelete('cascade');
            $table->foreign('id_peserta')->references('id_peserta')->on('peserta')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pendaftaran');
    }
};

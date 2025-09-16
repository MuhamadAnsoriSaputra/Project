<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mata_kuliah', function (Blueprint $table) {
            $table->id('id_matkul');                    // Primary Key
            $table->string('kode_matkul')->unique();    // Kode unik, misal ALPRO101
            $table->string('nama_matkul');              // Nama mata kuliah
            $table->integer('sks');                     // Jumlah SKS (1-6)
            $table->integer('semester');                // Semester (1-8)
            $table->timestamps();                       // created_at & updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mata_kuliah');
    }
};

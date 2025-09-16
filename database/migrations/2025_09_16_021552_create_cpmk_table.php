<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cpmk', function (Blueprint $table) {
            $table->id('id_cpmk');                      // Primary Key
            $table->string('kode_cpmk')->unique();      // Kode CPMK (misal CPMK01)
            $table->string('nama_cpmk');                // Nama CPMK
            $table->decimal('bobot_cpmk', 5, 2);        // Bobot CPMK (0-100)
            $table->unsignedBigInteger('id_matkul');    // Foreign Key ke mata_kuliah
            $table->timestamps();

            // Relasi ke tabel mata_kuliah
            $table->foreign('id_matkul')
                  ->references('id_matkul')
                  ->on('mata_kuliah')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cpmk');
    }
};

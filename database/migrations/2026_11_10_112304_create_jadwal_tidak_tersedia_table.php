<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jadwal_tidak_tersedia', function (Blueprint $table) {
            $table->id('id_jadwal_tidak_tersedia');

            $table->foreignId('lapangan_id')
                ->constrained('lapangan', 'id_lapangan')
                ->cascadeOnDelete();

            $table->timestampTz('waktu_mulai');
            $table->timestampTz('waktu_selesai');

            $table->text('alasan')->nullable();

            $table->timestampsTz();

            $table->index([
                'lapangan_id',
                'waktu_mulai',
                'waktu_selesai'
            ]);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jadwal_tidak_tersedia');
    }
};

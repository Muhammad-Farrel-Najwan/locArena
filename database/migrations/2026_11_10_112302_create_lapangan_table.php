<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('lapangan', function (Blueprint $table) {
            $table->id('id_lapangan');

            $table->foreignId('venue_id')
                ->constrained('venue', 'id_venue')
                ->cascadeOnDelete();

            $table->foreignId('jenis_lapangan_id')
                ->constrained('jenis_lapangan', 'id_jenis_lapangan')
                ->restrictOnDelete();

            $table->string('nama_lapangan', 100);
            $table->text('deskripsi_lapangan')->nullable();

            $table->boolean('is_indoor')->default(false);

            $table->decimal('harga_per_jam', 12, 2);

            $table->string('status', 20)->default('aktif');
            $table->string('jenis_lantai', 50)->nullable();

            $table->timestampsTz();

            $table->index(['venue_id', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lapangan');
    }
};

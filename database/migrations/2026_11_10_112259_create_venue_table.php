<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('venue', function (Blueprint $table) {
            $table->id();

            $table->foreignId('pemilik_id')
                ->constrained('pemilik_lapangan')
                ->restrictOnDelete();

            $table->foreignId('kecamatan_id')
                ->constrained('kecamatan')
                ->restrictOnDelete();

            $table->string('nama_venue', 100);
            $table->text('detail_alamat');

            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();

            $table->boolean('status_verifikasi')->default(0);
            $table->text('alasan_penolakan')->nullable();

            $table->timestampsTz();

            $table->index('status_verifikasi');
            $table->index('pemilik_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('venue');
    }
};

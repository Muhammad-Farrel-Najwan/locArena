<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('riwayat_verifikasi_venue', function (Blueprint $table) {
            $table->id('id_riwayat');

            $table->foreignId('venue_id')
                ->constrained('venue', 'id_venue')
                ->cascadeOnDelete();

            $table->foreignId('admin_id')
                ->constrained('users', 'id_user')
                ->restrictOnDelete();

            $table->string('status_sebelumnya', 20)->nullable();
            $table->string('status_baru', 20);

            $table->text('catatan')->nullable();

            $table->timestampsTz();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('riwayat_verifikasi_venue');
    }
};

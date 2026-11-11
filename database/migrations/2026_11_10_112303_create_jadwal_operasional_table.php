<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jadwal_operasional', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('hari');
            $table->time('jam_buka');
            $table->time('jam_tutup');

            $table->foreignId('venue_id')
                ->constrained('venue')
                ->cascadeOnDelete();

            $table->unique(['venue_id', 'hari']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jadwal_operasional');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kecamatan', function (Blueprint $table) {
            $table->id('id_kecamatan');

            $table->string('nama_kecamatan', 100);

            $table->foreignId('kota_id')
                ->constrained('kota', 'id_kota')
                ->restrictOnDelete();

            $table->unique(['kota_id', 'nama_kecamatan']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kecamatan');
    }
};

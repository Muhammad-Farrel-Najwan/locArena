<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kota', function (Blueprint $table) {
            $table->id('id_kota');

            $table->string('nama_kota', 100);

            $table->foreignId('provinsi_id')
                ->constrained('provinsi', 'id_provinsi')
                ->restrictOnDelete();

            $table->unique(['provinsi_id', 'nama_kota']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kota');
    }
};

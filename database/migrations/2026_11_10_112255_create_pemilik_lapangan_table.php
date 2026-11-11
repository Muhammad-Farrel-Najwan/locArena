<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pemilik_lapangan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_depan', 50);
            $table->string('nama_belakang', 50)->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean('jenis_kelamin');
            $table->string('no_telepon');
            $table->string('no_ktp', 20)->unique();
            $table->string('foto_ktp')->nullable();
            $table->timestampsTz();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profil_pemilik');
    }
};

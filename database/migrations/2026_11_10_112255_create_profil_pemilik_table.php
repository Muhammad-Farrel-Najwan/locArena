<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('profil_pemilik', function (Blueprint $table) {
            $table->id('id_profil_pemilik');

            $table->foreignId('user_id')
                ->unique()
                ->constrained('users', 'id_user')
                ->restrictOnDelete();

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

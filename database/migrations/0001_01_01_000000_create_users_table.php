<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            $table->string('nama_depan', 50);
            $table->string('nama_belakang', 50)->nullable();

            $table->string('email', 100)->unique();
            $table->timestampTz('email_verified_at')->nullable();

            $table->string('password');

            $table->string('jenis_kelamin', 10)->nullable();
            $table->string('no_telepon', 20)->nullable();

            $table->string('role', 20);

            $table->timestampsTz();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

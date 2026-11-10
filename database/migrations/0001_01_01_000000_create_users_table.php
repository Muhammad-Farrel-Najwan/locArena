<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Tabel pengguna locArena
        Schema::create('users', function (Blueprint $table) {
            $table->id('id_user');

            $table->string('nama_depan', 50);
            $table->string('nama_belakang', 50)->nullable();

            $table->string('email', 100)->unique();
            $table->timestampTz('email_verified_at')->nullable();

            $table->string('password');

            $table->string('jenis_kelamin', 10)->nullable();
            $table->string('no_telepon', 20)->nullable();

            $table->string('role', 20);

            $table->rememberToken();
            $table->timestampsTz();

            $table->index('role');
        });

        // Tabel reset password Laravel
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        // Tabel session pengguna
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();

            $table->foreignId('user_id')->nullable()->index();

            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();

            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('users');
    }
};

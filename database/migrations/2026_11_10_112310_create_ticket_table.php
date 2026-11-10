<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ticket', function (Blueprint $table) {
            $table->id('id_ticket');

            $table->foreignId('user_id')
                ->constrained('users', 'id_user')
                ->restrictOnDelete();

            $table->text('deskripsi_laporan');

            $table->string('jenis_laporan', 50)->nullable();

            $table->string('status', 20)->default('open');

            $table->timestampsTz();

            $table->index(['user_id', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ticket');
    }
};

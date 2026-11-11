<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reply_data', function (Blueprint $table) {
            $table->id();

            $table->foreignId('ticket_id')
                ->constrained('ticket')
                ->cascadeOnDelete();

            $table->text('deskripsi_reply');

            $table->string('jenis_penyelesaian', 50)->nullable();

            $table->string('status', 20)->default('open');

            $table->timestampsTz();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reply_data');
    }
};

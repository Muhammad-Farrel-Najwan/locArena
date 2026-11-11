<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rating', function (Blueprint $table) {
            $table->id();

            $table->foreignId('detail_transaksi_id')
                ->constrained('detail_transaksi')
                ->restrictOnDelete();

            $table->tinyInteger('nilai_rating');

            $table->text('deskripsi_rating')->nullable();

            $table->timestampTz('tanggal_rating')->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rating');
    }
};

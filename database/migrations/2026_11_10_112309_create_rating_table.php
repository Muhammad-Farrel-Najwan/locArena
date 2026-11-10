<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rating', function (Blueprint $table) {
            $table->id('id_rating');

            $table->foreignId('detail_transaksi_id')
                ->unique()
                ->constrained('detail_transaksi', 'id_detail_transaksi')
                ->restrictOnDelete();

            $table->smallInteger('nilai_rating');

            $table->text('deskripsi_rating')->nullable();

            $table->timestampTz('tanggal_rating')->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rating');
    }
};

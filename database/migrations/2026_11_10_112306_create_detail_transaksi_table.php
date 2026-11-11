<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('detail_transaksi', function (Blueprint $table) {
            $table->id();

            $table->foreignId('transaksi_id')
                ->constrained('transaksi')
                ->cascadeOnDelete();

            $table->foreignId('lapangan_id')
                ->constrained('lapangan')
                ->restrictOnDelete();

            $table->timestampTz('waktu_mulai');
            $table->timestampTz('waktu_selesai');

            $table->decimal('harga_per_jam', 12, 2);
            $table->decimal('subtotal', 12, 2);

            $table->string('status_booking', 30)
                ->default('menunggu_pembayaran');

            $table->string('kode_qr')->nullable()->unique();

            $table->timestampsTz();

            $table->index([
                'lapangan_id',
                'status_booking'
            ]);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detail_transaksi');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id('id_transaksi');

            $table->foreignId('customer_id')
                ->constrained('users', 'id_user')
                ->restrictOnDelete();

            $table->foreignId('pemilik_id')
                ->constrained('profil_pemilik', 'id_profil_pemilik')
                ->restrictOnDelete();

            $table->decimal('total_harga', 12, 2);

            $table->string('metode_pembayaran', 20);

            $table->decimal('persentase_dp', 5, 2)->default(50);

            $table->string('status_transaksi', 30)
                ->default('menunggu_pembayaran');

            $table->timestampTz('batas_pembayaran')->nullable();
            $table->timestampTz('batas_pelunasan')->nullable();

            $table->timestampsTz();

            $table->index(['customer_id', 'status_transaksi']);
            $table->index(['pemilik_id', 'status_transaksi']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};

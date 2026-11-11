<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id();

            $table->foreignId('transaksi_id')
                ->constrained('transaksi')
                ->restrictOnDelete();

            $table->string('jenis_pembayaran', 20);

            $table->string('external_order_id', 100)->unique();

            $table->string('provider_transaction_id', 100)
                ->nullable()
                ->unique();

            $table->decimal('nominal_pembayaran', 12, 2);

            $table->string('status', 20)->default('pending');

            $table->text('snap_token')->nullable();
            $table->text('payment_url')->nullable();
            $table->string('provider_status', 50)->nullable();

            $table->timestampTz('expires_at')->nullable();
            $table->timestampTz('paid_at')->nullable();

            $table->timestampsTz();

            $table->index(['transaksi_id', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};

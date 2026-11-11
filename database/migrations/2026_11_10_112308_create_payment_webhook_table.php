<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payment_webhook', function (Blueprint $table) {
            $table->id();

            $table->foreignId('pembayaran_id')
                ->constrained('pembayaran')
                ->restrictOnDelete();

            $table->jsonb('payload');

            $table->string('payload_hash', 64)->nullable();

            $table->boolean('signature_valid')->default(false);

            $table->string('processing_status', 20)
                ->default('pending');

            $table->timestampTz('received_at')->useCurrent();
            $table->timestampTz('processed_at')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payment_webhook');
    }
};

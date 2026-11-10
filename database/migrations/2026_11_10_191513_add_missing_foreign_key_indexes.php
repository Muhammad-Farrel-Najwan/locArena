<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('venue', function (Blueprint $table) {
            $table->index('kecamatan_id', 'venue_kecamatan_id_index');
        });

        Schema::table('lapangan', function (Blueprint $table) {
            $table->index('jenis_lapangan_id', 'lapangan_jenis_lapangan_id_index');
        });

        Schema::table('detail_transaksi', function (Blueprint $table) {
            $table->index('transaksi_id', 'detail_transaksi_transaksi_id_index');
        });

        Schema::table('payment_webhook', function (Blueprint $table) {
            $table->index('pembayaran_id', 'payment_webhook_pembayaran_id_index');
        });

        Schema::table('riwayat_verifikasi_venue', function (Blueprint $table) {
            $table->index('venue_id', 'riwayat_verifikasi_venue_venue_id_index');
            $table->index('admin_id', 'riwayat_verifikasi_venue_admin_id_index');
        });

        Schema::table('reply_data', function (Blueprint $table) {
            $table->index('ticket_id', 'reply_data_ticket_id_index');
            $table->index('user_id', 'reply_data_user_id_index');
        });
    }

    public function down(): void
    {
        Schema::table('reply_data', function (Blueprint $table) {
            $table->dropIndex('reply_data_user_id_index');
            $table->dropIndex('reply_data_ticket_id_index');
        });

        Schema::table('riwayat_verifikasi_venue', function (Blueprint $table) {
            $table->dropIndex('riwayat_verifikasi_venue_admin_id_index');
            $table->dropIndex('riwayat_verifikasi_venue_venue_id_index');
        });

        Schema::table('payment_webhook', function (Blueprint $table) {
            $table->dropIndex('payment_webhook_pembayaran_id_index');
        });

        Schema::table('detail_transaksi', function (Blueprint $table) {
            $table->dropIndex('detail_transaksi_transaksi_id_index');
        });

        Schema::table('lapangan', function (Blueprint $table) {
            $table->dropIndex('lapangan_jenis_lapangan_id_index');
        });

        Schema::table('venue', function (Blueprint $table) {
            $table->dropIndex('venue_kecamatan_id_index');
        });
    }
};

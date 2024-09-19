<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->increments('id_pembayaran');
            $table->unsignedInteger('id_reservasi');
            $table->decimal('jumlah', 8, 2);
            $table->dateTime('tanggal_pembayaran');
            $table->enum('status_pembayaran', ['Paid', 'Pending', 'Cancelled']);
            $table->enum('jenis_pembayaran', ['Deposit', 'Full Payment']);
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('id_reservasi')->references('id_reservasi')->on('reservasis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pembayarans', function (Blueprint $table) {
            $table->dropForeign(['id_reservasi']);
        });
        Schema::dropIfExists('pembayarans');
    }
};

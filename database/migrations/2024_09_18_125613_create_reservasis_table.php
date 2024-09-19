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
        Schema::create('reservasis', function (Blueprint $table) {
            $table->increments('id_reservasi');
            $table->unsignedInteger('id_meja');
            $table->unsignedInteger('id_customer');
            $table->integer('jumlah_pengunjung');
            $table->date('tanggal');
            $table->time('waktu');
            $table->enum('status', ['Confirmed', 'Pending', 'Cancelled']);
            $table->timestamps();
            $table->foreign('id_meja')->references('id_meja')->on('mejas')->onDelete('cascade');
            $table->foreign('id_customer')->references('id_customer')->on('customers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reservasis', function (Blueprint $table) {
            $table->dropForeign(['id_meja']);
            $table->dropForeign(['id_customer']);
        });
        Schema::dropIfExists('reservasis');
    }
};

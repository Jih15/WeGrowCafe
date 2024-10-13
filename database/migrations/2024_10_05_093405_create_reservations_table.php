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
        Schema::create('reservations', function (Blueprint $table) {
            $table->increments('reservation_id');
            $table->unsignedInteger('table_id');
            $table->unsignedInteger('customer_id');
            $table->integer('number_of_customer');
            $table->date('date');
            $table->time('time');
            $table->enum('status', ['Confirmed', 'Pending', 'Cancelled']);
            $table->timestamps();
            $table->foreign('table_id')->references('table_id')->on('tables')->onDelete('cascade');
            $table->foreign('customer_id')->references('customer_id')->on('customers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reservations', function (Blueprint $table) {
            $table->dropForeign(['table_id']);
            $table->dropForeign(['customer_id']);
        });
        Schema::dropIfExists('reservations');
    }
};

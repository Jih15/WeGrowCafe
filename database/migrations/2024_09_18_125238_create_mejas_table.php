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
        Schema::create('mejas', function (Blueprint $table) {
            $table->increments('id_meja');
            $table->unsignedInteger('id_cafe');
            $table->string('nomor_meja', 20);
            $table->integer('kapasitas');
            $table->string('lokasi_meja', 50);
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('id_cafe')->references('id_cafe')->on('cafes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mejas', function (Blueprint $table) {
            $table->dropForeign(['id_cafe']);
        });
        Schema::dropIfExists('mejas');
    }
};

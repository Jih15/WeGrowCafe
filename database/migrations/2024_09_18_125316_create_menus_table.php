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
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id_menu');
            $table->unsignedInteger('id_cafe');
            $table->string('nama_menu', 255);
            $table->decimal('harga_menu', 8, 2);
            $table->text('deskripsi')->nullable();
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
        Schema::table('menus', function (Blueprint $table) {
            $table->dropForeign(['id_cafe']);
        });
        Schema::dropIfExists('menus');
    }
};

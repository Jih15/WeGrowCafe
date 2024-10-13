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
        Schema::create('tables', function (Blueprint $table) {
            $table->increments('table_id');
            $table->unsignedInteger('cafe_id');
            $table->string('table_number', 20);
            $table->integer('capacity');
            $table->string('table_location', 50);
            $table->string('table_photo')->nullable();
            $table->timestamps();
            $table->foreign('cafe_id')->references('cafe_id')->on('cafes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tables', function (Blueprint $table) {
            $table->dropForeign(['cafe_id']);
        });
        Schema::dropIfExists('tables');
    }
};

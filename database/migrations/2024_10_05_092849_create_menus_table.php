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
            $table->increments('menu_id');
            $table->unsignedInteger('cafe_id');
            $table->string('menu_name', 55);
            $table->decimal('menu_price', 8, 2);
            $table->string('menu_photo')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
            $table->foreign('cafe_id')->references('cafe_id')->on('cafes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('menus', function (Blueprint $table) {
            $table->dropForeign(['cafe_id']);
        });
        Schema::dropIfExists('menus');
    }
};

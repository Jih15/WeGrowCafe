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
        Schema::create('otentikasis', function (Blueprint $table) {
            $table->increments('id_otentikasi');
            $table->string('id_provider', 50);
            $table->enum('provider', ['Google', 'Facebook', 'Twitter', 'Email']);
            $table->text('token');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('otentikasis');
    }
};

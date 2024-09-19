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
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id_admin');
            $table->unsignedInteger('id_cafe')->nullable(); // Nullable for Master Admin
            $table->string('nama', 255);
            $table->string('email', 255)->unique();
            $table->string('password', 255);
            $table->string('no_telepon', 20);
            $table->enum('role', ['Master Admin', 'Cafe Admin']);
            $table->timestamps();

            // Foreign key constraint, only applies to Cafe Admin
            $table->foreign('id_cafe')->references('id_cafe')->on('cafes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('admins', function (Blueprint $table) {
            $table->dropForeign(['id_cafe']);
        });
        Schema::dropIfExists('admins');
    }
};

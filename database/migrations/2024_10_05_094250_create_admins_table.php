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
            $table->increments('admin_id');
            $table->unsignedInteger('cafe_id')->nullable();
            $table->enum('role', ['Master Admin', 'Cafe Admin']);
            $table->string('name', 55);
            $table->string('email', 191)->unique(); // Mengubah panjang email menjadi 191
            $table->string('password');
            $table->string('phone', 20);
            $table->string('profile_photo')->nullable();
            $table->unsignedInteger('authentication_id');
            $table->timestamps();

            // Foreign key relationships
            $table->foreign('cafe_id')->references('cafe_id')->on('cafes')->onDelete('cascade');
            $table->foreign('authentication_id')->references('authentication_id')->on('authentications')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('admins', function (Blueprint $table) {
            $table->dropForeign(['cafe_id']);
            $table->dropForeign(['authentication_id']);
        });
        Schema::dropIfExists('admins');
    }
};

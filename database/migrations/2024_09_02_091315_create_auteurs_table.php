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
       Schema::create('auteurs', function (Blueprint $table) {
    $table->id(); // AUTO_INCREMENT
    $table->string('nom');
    $table->string('prenom');
    $table->string('numero');
    $table->unsignedBigInteger('user_id');
    $table->string('email');
    $table->string('contact_what');
    $table->string('etat')->default('nonlu');
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('auteurs');
    }
};
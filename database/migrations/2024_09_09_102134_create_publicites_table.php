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
        Schema::create('publicites', function (Blueprint $table) {
            $table->id();
           
             $table->string('titre');
            $table->text('description')->nullable(); // texte descriptif
            $table->string('image')->nullable(); // image du carrousel
            $table->decimal('reduction', 5, 2)->default(0); // % de réduction, ex: 20.00
            $table->date('date_debut')->nullable(); // date de début d’affichage
            $table->date('date_fin')->nullable(); // date de fin d’affichage
            $table->boolean('actif')->default(true); // publicité active ou non
            $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publicites');
    }
};

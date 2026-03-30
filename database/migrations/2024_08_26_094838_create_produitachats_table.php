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
        Schema::create('produitachats', function (Blueprint $table) {
            $table->id();
            $table->string('etat');
            $table->decimal('prixa', 20, 2); 
            $table->decimal('prixv', 20, 2)->default(0); 

            $table->integer('qtte'); 

            $table->foreignId('produit_id')->constrained('produits')->cascadeOnDelete();
            $table->foreignId('achat_id')->constrained('achats')->cascadeOnDelete();


            $table->timestamps();

           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produitachats');
    }
};

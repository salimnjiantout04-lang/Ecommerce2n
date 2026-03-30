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
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->longtext('libelle');
            $table->string('image')->nullable();
            $table->foreignId('categorie_id')->constrained('categories')->cascadeOnDelete(); // Ensure this matches your table name
            $table->foreignId('souscategorie_id')->constrained('sous_categories')->cascadeOnDelete(); // Ensure this matches your table name

            $table->longText('description');

            $table->decimal('prix',20,2)->default(0);
            $table->integer('qttestock')->default(0);


            $table->decimal('prixbonetat',20,2)->default(0);
            $table->integer('qttestockbonetat')->default(0);

           /* $table->decimal('prixetatcorrect',20,2)->default(0);
            $table->integer('qttestocketatcorrect')->default(0);
*/


            $table->boolean('is_active')->default(true);
            $table->boolean('in_stock')->default(true);
            $table->boolean('on_sale')->default(true);
            $table->boolean('is_featured')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produits');
    }
};
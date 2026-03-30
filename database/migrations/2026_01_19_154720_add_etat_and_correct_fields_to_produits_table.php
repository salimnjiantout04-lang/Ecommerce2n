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
        Schema::table('produits', function (Blueprint $table) {
            if (!Schema::hasColumn('produits', 'etat')) {
                $table->enum('etat', ['neuf', 'bon', 'correct'])->default('neuf')->after('prixbonetat');
            }
            if (!Schema::hasColumn('produits', 'prixetatcorrect')) {
                $table->decimal('prixetatcorrect', 20, 2)->default(0)->after('prixbonetat');
            }
            if (!Schema::hasColumn('produits', 'qttestocketatcorrect')) {
                $table->integer('qttestocketatcorrect')->default(0)->after('qttestockbonetat');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('produits', function (Blueprint $table) {
            //
        });
    }
};

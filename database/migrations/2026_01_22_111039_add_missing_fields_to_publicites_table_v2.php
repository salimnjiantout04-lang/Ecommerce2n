<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Column already exists as 'titre' in the original migration
        // No action needed
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('publicites', function (Blueprint $table) {
            //
        });
    }
};

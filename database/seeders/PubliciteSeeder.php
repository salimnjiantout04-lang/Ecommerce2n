<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

DB::table('publicites')->insert([
    'titre' => 'Soldes d\'été ☀️',
    'description' => 'Profitez des soldes d\'été avec jusqu\'à 50% de réduction !',
    'image' => 'publicites/ete.jpg',
    'reduction' => 50,
    'date_debut' => '2025-06-15',
    'date_fin' => '2025-07-15',
    'actif' => false,
]);

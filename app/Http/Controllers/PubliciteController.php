<?php

namespace App\Http\Controllers;

use App\Models\Publicite;
use App\Models\User;
use App\Models\Produit;
use Illuminate\Http\Request;

class PubliciteController extends Controller
{
    public function index()
    {
        $publicites = Publicite::actives()->get();
        $produits = Produit::where('reduction', '>', 0)->get();

        // 5 meilleurs clients selon le total d’achats
        $meilleursClients = User::withSum('commandes', 'montant_total')
            ->orderByDesc('commandes_sum_montant_total')
            ->take(5)
            ->get();

        return view('accueil', compact('publicites', 'produits', 'meilleursClients'));
    }
}
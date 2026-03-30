<?php

namespace App\Http\Controllers;
use App\Http\Controllers\produitcontroller;
use App\Http\Controllers\SousCategorieController;
use App\Models\Image;
use App\Models\Produit;
use App\Models\Categorie;
use App\Http\Controller\SeoTools;
use App\Models\SousCategorie;
use Artesaos\SEOTools\Facades\OpenGraph;


class OccasionController extends Controller
{

 public function tousProduits()
{
    // Produits d'occasion
    $produits = Produit::whereNotNull('prixbonetat')
        ->where('qttestockbonetat', '>', 0)
        ->paginate(12);

    // Catégories (menu principal)
    $categories = Categorie::all();

    // Sous-catégories 
    $souscategories = Categorie::orderBy('created_at', 'desc')
        ->take(5)
        ->get();

    // Sous-catégories pour le header
    $souscategories1 = Categorie::orderBy('created_at', 'desc')
       
        ->get();



    return view('occasion', compact('produits', 'categories', 'souscategories', 'souscategories1'));
}


    /**
     * Affiche les produits d'occasion filtrés par catégorie.
     */
   public function produitParCategorie($id)
{
    // Récupérer la catégorie sélectionnée
    $categorie = Categorie::findOrFail($id);
    $selectedCatName = $categorie->libelle;

    // Produits d'occasion filtrés par catégorie
    $produits = Produit::where('categorie_id', $id)
        ->whereNotNull('prixbonetat')
        ->where('qttestockbonetat', '>', 0)
        ->paginate(12);

    // Récupérer toutes les catégories
    $categories = Categorie::all();

    // Récupérer toutes les sous-catégories
    $souscategories = SousCategorie::orderBy('created_at', 'desc')->get();
    $souscategories1 = SousCategorie::orderBy('created_at', 'desc')->get();

    // Si aucun produit d'occasion trouvé
    // Définir $message seulement si pas de produit
    $message = null;
    if ($produits->isEmpty()) {
        $message = "Désolé, aucun produit en occasion disponible pour la catégorie « {$categorie->libelle} ».";
    }

    return view('occasion', compact(
        'categorie',
        'produits',
        'categories',
        'souscategories',
        'souscategories1',
        'selectedCatName',
        'message'   // <- toujours défini (même null)
    ));
}


    // Fichier : App/Http/Controllers/ProduitController.php

public function detailprodOccasion($id)
{
    $produit = Produit::with(['Caracteristique', 'Souscategorie','souscategories1', 'Images'])->findOrFail($id);

    // **************************************************************
    // CLÉ : On force l'affichage de l'état Occasion dans la vue
    // **************************************************************
    $isOccasionMode = true;

    // Les variables de navigation restent les mêmes
    $sousCategories = Categorie::orderBy('created_at', 'desc')
        ->limit(5)
        ->get();
    $souscategories1 = Categorie::orderBy('created_at', 'desc')
        ->get();

    // Configuration SEO (peut être réutilisée si nécessaire)
    SEOTools::setTitle($produit->libelle . '  - Occasion');
    // ... autres configurations SEO ...

    return view('produit.detailproduit', compact('produit', 'souscategories', 'souscategories1', 'isOccasionMode'));
}
}
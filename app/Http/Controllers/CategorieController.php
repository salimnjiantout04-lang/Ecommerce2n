<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Subcateg;

use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function FormCategorie(){
        $categories = Subcateg::all();
        return view('Categorie.categorie', compact('categories'));
    }

    public function AddCategorie(Request $request){
        $request->validate([
            'categorie' => 'required',
        ]);
        $car=new Categorie();
        $car->nomCat=$request->categorie;
        $res=$car->save();
        if($res){
           return redirect('/ListeCategorie')->with('statue','Catégorie Ajoutée');
        }
        else{
            return redirect('/Categorie')->with('failcat', ' Categorie n a pas été ajoutée');
        }
    }

    // Dans votre contrôleur (ex: HomeController.php)
public function index()
{
    // Récupérer toutes les catégories avec un produit aléatoire et ses images
    $souscategories = Categorie::with(['produit' => function($query) {
        $query->with('images')->whereHas('images')->inRandomOrder()->limit(1);
    }])->get();

    // Pour chaque catégorie, récupérer un produit avec ses images
    foreach ($souscategories as $category) {
        $category->randomProduct = $category->produit->first();
    }

    // Récupérer les produits pour la section produits phares
    $produits = Produit::with(['images', 'categorie'])
                        ->where('visible', true)
                        ->inRandomOrder()
                        ->take(12)
                        ->get();

    return view('guestcontain', [
        'souscategories' => $souscategories,
        'produits' => $produits
    ]);
}
    
    // public function AddCategorie(Request $request){
       
    //     $request->validate([
    //         'categorie' => 'required',
    //     ]);

    //     if (strpos($request->categorie1, "---") !== false) {
    //         $parties = explode("---", $request->categorie1);
    //         // Assurez-vous d'avoir exactement trois parties
    //         if (count($parties) === 2) {
    //             list($part1, $maxId) = $parties;  
    //          } }
    //          else {
    //         $scat=new Subcateg();
    //         $scat->nomsubcat=$request->categorie1;
    //         $sres=$scat->save();
    //         if($sres){
    //             $maxId = Subcateg::max('id');
    //         }
    //     }

    //     $cat=new Categorie();
    //     $cat->nomCat=$request->categorie;
    //     // $cat->subcateg_id=(int) $maxId;

    //     $res=$cat->save();
    //     if($res){
    //         return redirect('/Categorie')->with('sucesscat', ' Catégorie Ajoutée avec Succès');
    //     }
    //     else{
    //         return redirect('/Categorie')->with('failcat', ' Categorie n a pas été ajoutée');
    //     }
    // }

    public function Liste(){
        $categories = Categorie::all();
        return view('Categorie.ListeCategorie', compact('categories'));
    }

    public function Supprimer($id){
        // $request->validate([
        //     'categorie' => 'required',
        // ]);
        $categories = Categorie::find($id);
        $categories->delete();
        return redirect('/ListeCategorie')->with('status','Catégorie Supprimée avec succès');
        
    }

    public function Modifier($id){
        $categories = Categorie::find($id);
    //    dd($categories) ;
        return view('Categorie.EditCategorie', compact('categories'));
    }

    public function Update(Request $request){
        $request->validate([
            'categorie' => 'required',
        ]);
        $categories = Categorie::find($request->id);
        $categories->nomCat = $request->categorie;
        $categories->Update();
        return redirect('/ListeCategorie')->with('statue','Catégorie Modifiée avec succès');

    }


}
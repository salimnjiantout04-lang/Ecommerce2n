<?php

namespace App\Http\Controllers;

use COM;
use App\Models\Produit;
use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Models\SousCategorie;

class SousCategorieController extends Controller
{
    public function FormSousCategorie(){
        $categories = Categorie::all();

        return view('SousCategorie.souscategorie',['categories' => $categories]);
    }
    
    public function AddSousCategorie(Request $request){
        $request->validate([
            'souscategorie' => 'required',
            'categorie' => 'required',
        ]);
        $car=new SousCategorie();
        $car->nomsubCat=$request->souscategorie;
        $car->categorie_id=$request->categorie;
        $res=$car->save();
        if($res){
            return redirect('/SousCategorie')->with('sucesscat', ' Sous Catégorie Ajoutée avec Succès');
        }
        else{
            return redirect('/SousCategorie')->with('failcat', ' Sous Catégorie n a pas été ajoutée');
        }
    }

    public function Liste(){
        $souscategories = SousCategorie::with('Categorie')->get();
        return view('SousCategorie.ListeSousCategorie', compact('souscategories'));
    }

    public function selectcategorie(){
        $categories = Categorie::all();

        return view('SousCategorie.souscategorie',['categories' => $categories]);
    }

    public function Supprimer($id){
        // $request->validate([
        //     'categorie' => 'required',
        // ]);
        $souscategories = SousCategorie::find($id);
        $souscategories->delete();
        return redirect('/ListeSousCategorie')->with('status','Sous Catégorie Supprimée avec succès');
        
    }

    public function Modifier($id){
        $souscategories = SousCategorie::find($id);
        $categories = Categorie::all();
    //    dd($Caracteristiques) ;
        return view('SousCategorie.EditSousCategorie', compact('souscategories','categories'));
       
    }
  
    
    public function Update(Request $request){
        $request->validate([
            'souscategorie' => 'required',
            'categorie' => 'required',
        ]);
        $souscategories = SousCategorie::find($request->id);
        $souscategories->nomsubCat = $request->souscategorie;
        $souscategories->categorie_id=$request->categorie;

        $souscategories->Update();
        return redirect('/ListeSousCategorie')->with('statue','Sous Catégorie Modifiée avec succès');

    }

    

}

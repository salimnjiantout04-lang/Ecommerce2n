<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Caracteristique;

class CaracteristiqueController extends Controller
{
    public function FormCaracteristique(){
        return view('Caracteristique.caracteristique');
    }
    
    public function AddCaracteristique(Request $request){
        $request->validate([
            'caracteristique' => 'required',
        ]);
        $car=new Caracteristique();
        $car->nomCaract=$request->caracteristique;
        $res=$car->save();
        if($res){
            return redirect('/Caracteristique')->with('sucesscat', ' Caractéristique Ajoutée avec Succès');
        }
        else{
            return redirect('/Caracteristique')->with('failcat', ' Caractéristique n a pas été ajoutée');
        }
    }

    public function Liste(){
        $caracteristiques = Caracteristique::all();
        return view('Caracteristique.ListeCaracteristique', compact('caracteristiques'));
    }

    public function Supprimer($id){
        // $request->validate([
        //     'categorie' => 'required',
        // ]);
        $caracteristiques = Caracteristique::find($id);
        $caracteristiques->delete();
        return redirect('/ListCaracteristique')->with('status','Caractéristique Supprimée avec succès');
        
    }

    public function Modifier($id){
        $caracteristiques = Caracteristique::find($id);
    //    dd($Caracteristiques) ;
        return view('Caracteristique.EditCaracteristique', compact('caracteristiques'));
    }

    public function Update(Request $request){
        $request->validate([
            'caracteristique' => 'required',
        ]);
        $caracteristiques = Caracteristique::find($request->id);
        $caracteristiques->nomCaract = $request->caracteristique;
        $caracteristiques->Update();
        return redirect('/ListCaracteristique')->with('statue','Caractéristique Modifiée avec succès');

    }

    

}

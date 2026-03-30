<?php

namespace App\Http\Controllers;

use App\Models\Localisation;
use Illuminate\Http\Request;

class LocalisationController extends Controller
{
    public function FormLocalisation(){
        return view('Localisation.localisation');
    }
    
    public function AddLocalisation(Request $request){
        $request->validate([
            'localisation' => 'required',
        ]);
        $local=new Localisation();
        $local->nom_localisation=$request->localisation;
        $res=$local->save();
        if($res){
            return redirect('/Localisation')->with('sucesscat', ' Localisation Ajoutée avec Succès');
        }
        else{
            return redirect('/Localisation')->with('failcat', ' Localisation n a pas été ajoutée');
        }
    }

    public function Liste(){
        $localisations = Localisation::all();
        return view('Localisation.ListeLocalisation', compact('localisations'));
    }

    public function Supprimer($id){
        // $request->validate([
        //     'categorie' => 'required',
        // ]);
        $localisations = Localisation::find($id);
        $localisations->delete();
        return redirect('/ListLocalisation')->with('status','Localisation Supprimée avec succès');
        
    }

    public function Modifier($id){
        $localisations = Localisation::find($id);
    //    dd($localisations) ;
        return view('Localisation.EditLocalisation', compact('localisations'));
    }

    public function Update(Request $request){
        $request->validate([
            'localisation' => 'required',
        ]);
        $localisations = Localisation::find($request->id);
        $localisations->nom_localisation = $request->localisation;
        $localisations->Update();
        return redirect('/ListLocalisation')->with('statue','Localisation Modifiée avec succès');

    }


}
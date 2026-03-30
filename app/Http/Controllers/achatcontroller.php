<?php

namespace App\Http\Controllers;
use App\Models\Produit;
use App\Models\achat;
use App\Models\Achatsecre;
use App\Models\Produitachat;
use App\Models\Ventesecre;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class achatcontroller extends Controller
{
    public function Formachat(){
        $produits = Produit::all();

        return view('Achat.achat',['produits' => $produits]);
    }

    public function achatsecre(){
        $produits = Produit::all();

        return view('Achat.achatsecre',['produits' => $produits]);
    }

    public function ventesecre(){
        $produits = Produit::all();

        return view('Vente.ventesecre',['produits' => $produits]);
    }

    public function listeachat(){


        $achats = DB::table('achats')
        ->join('produitachats', 'achats.id', '=', 'produitachats.achat_id')
        ->join('produits', 'produitachats.produit_id', '=', 'produits.id')
        ->select('achats.id as achat_id', 'produits.id as produit_id', 'produits.libelle as produit_name', 'produitachats.qtte', 'produitachats.prixa', 'produitachats.prixv', 'produitachats.created_at')
        ->orderBy('achats.created_at', 'desc') // Trier par date en ordre décroissant
        ->limit(100) // Limiter les résultats à 100
        ->get();
        return view('Achat.listeachat',['produits' => $achats]);
    }


    public function Formachat2(Request $request){
        $request->validate([
            'libelle' => 'required',
            'qtte' => 'required',
            'prix' => 'required',
            'etat' => 'required',
        ]);
        $qttep=$request->qtte;

        // Récupération du panier depuis la session
        $cart = session()->get('cartachat', []);

        // Vérification si le produit est déjà dans le panier
        if (isset($cart[$request->libelle.'__'.$request->etat] )) {
            // Incrémentation de la quantité
            $cart[$request->libelle.'__'.$request->etat]['qtte']=$cart[$request->libelle.'__'.$request->etat]['qtte']+$qttep;
        }

        else {
            // Ajout du produit au panier avec une quantité initiale de 1
            $cart[$request->libelle.'__'.$request->etat] = [
                "libelle" => $request->libelle,
                "prix" => $request->prix,
                "prixv" => $request->prixv,
                "qtte" => $request->qtte,
                "etat" => $request->etat

            ];
        }

        // Mise à jour du panier dans la session
        session()->put('cartachat', $cart);
       // \Log::info('Panier après ajout :', session()->get('cart'));


      return redirect()->route('formachat')->with('success','Panier Mis a jour avec succes');

        // Redirection avec un message de succès
    }


    public function Formachatsecre(Request $request){
        $request->validate([
            'libelle' => 'required',
            'qtte' => 'required',
            'etat' => 'required',
        ]);
        $order = new Achatsecre();
        $order->produit_id = $request->libelle;
        $order->etat = $request->etat;
        if(isset($request->prixv)){
            $order->prixv = $request->prixv;
        }
        else{
            $order->prixv =0;
        }

        $order->qtte = $request->qtte;
        $order->save();
       // \Log::info('Panier après ajout :', session()->get('cart'));
       $prod = Produit::find($request->libelle);
       if($request->etat=="neuve"){
            $prod->qttestock=$prod->qttestock+$request->qtte;
            if(isset($request->prixv)){
            $prod->prix=$request->prixv;
            }
       }
       elseif($request->etat=="occasion"){
        $prod->qttestockbonetat=$prod->qttestockbonetat+$request->qtte;
        if(isset($request->prixv)){
        $prod->prixbonetat=$request->prixv;
        }

    }
    /*elseif($request->etat=="Correct"){

        $prod->qttestocketatcorrect=$prod->qttestocketatcorrect+$request->qtte;
        if(isset($request->prixv)){
        $prod->prixetatcorrect=$request->prixv;
        }

    }*/
            $prod->Update();

      return redirect()->route('achatsecre')->with('success','Achat ajouter avec succes');

        // Redirection avec un message de succès
    }



    public function Formventesecre(Request $request){
        $request->validate([
            'libelle' => 'required',
            'prixv' => 'required',
            'qtte' => 'required',
            'etat' => 'required',
        ]);
        $order = new Ventesecre();
        $order->produit_id = $request->libelle;
        $order->etat = $request->etat;
        if(isset($request->prixv)){
            $order->prixv = $request->prixv;
        }

        $order->qtte = $request->qtte;
        $order->save();
       // \Log::info('Panier après ajout :', session()->get('cart'));
       $prod = Produit::find($request->libelle);
       if($request->etat=="neuve"){
            $prod->qttestock=$prod->qttestock-$request->qtte;
            if(isset($request->prixv)){
            $prod->prix=$request->prixv;
            }
       }
       elseif($request->etat=="occasion"){
        $prod->qttestockbonetat=$prod->qttestockbonetat-$request->qtte;
        if(isset($request->prixv)){
        $prod->prixbonetat=$request->prixv;
        }

    }

   /* elseif($request->etat=="Correct"){

        $prod->qttestocketatcorrect=$prod->qttestocketatcorrect-$request->qtte;
        if(isset($request->prixv)){
        $prod->prixetatcorrect=$request->prixv;
        }


    }*/
            $prod->Update();

      return redirect()->route('ventesecre')->with('success','Vente ajouter avec succes');

        // Redirection avec un message de succès
    }





    public function ajoutlivraison(){
        $cart = session()->get('cartachat', []);
$achat=new achat();
$achat->save();
$maxId = achat::max('id');
foreach ($cart as $productData) {
    // Exemple d'ajout dans une table `orders` pour chaque produit
    // Vous pouvez également avoir une autre logique en fonction de votre structure de base de données
    $order = new produitachat();
    $order->produit_id = $productData['libelle'];
    $order->achat_id = $maxId;
    $order->etat = $productData['etat'];
    $order->prixa = $productData['prix'];
    if(isset($productData['prixv'])){
        $order->prixv = $productData['prixv'];
    }
    $order->qtte = $productData['qtte'];
    $order->save();

    $prod = Produit::find($productData['libelle']);
   if($productData['etat']=="neuve"){
        $prod->qttestock=$prod->qttestock+$productData['qtte'];
        if(isset($productData['prixv'])){
        $prod->prix=$productData['prixv'];
        }
   }
   elseif($productData['etat']=="occasion"){
    $prod->qttestockbonetat=$prod->qttestockbonetat+$productData['qtte'];
    if(isset($productData['prixv'])){
    $prod->prixbonetat=$productData['prixv'];
    }

}
/*elseif($productData['etat']=="Correct"){

    $prod->qttestocketatcorrect=$prod->qttestocketatcorrect+$productData['qtte'];
    if(isset($productData['prixv'])){
    $prod->prixetatcorrect=$productData['prixv'];
    }

}*/
        $prod->Update();
}
session()->forget('cartachat');

    }


}

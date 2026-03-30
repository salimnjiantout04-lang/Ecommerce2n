<?php

namespace App\Http\Controllers;

use App\Models\Auteur;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderConfirmation;

class notificationcontroller extends Controller
{
    //

    public function liste()
    {
        $produits = Auteur::where('etat', 'nonlu')
            ->with('commandenvs.produit') // Load related commandes and products
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($produit) {
                // Add a flag to indicate if the product is expired (older than 48 hours)
                $produit->isExpired = \Carbon\Carbon::parse($produit->created_at)->addHours(48)->isPast();
                return $produit;


            });
             Auteur::where('etat', 'nonlu')->update(['etat' => 'lu']);
        return view('Notification.listenotif', compact('produits'));
    }

    public function listecom(){
        // $produits = Auteur::with(['commandenvs', 'Produit'])->where('etat', 'nonlu')->get();
         $produits = Auteur::where('etat', 'lu')
         ->with('commandenvs.produit') // Load related commandes and products
         ->orderBy('created_at', 'desc')
         ->get()
         ->map(function ($produit) {
             // Add a flag to indicate if the product is expired (older than 48 hours)
             $produit->isExpired = \Carbon\Carbon::parse($produit->created_at)->addHours(48)->isPast();
             return $produit;


         });
        // dd($produits);
         return view('Notification.listenotif', compact('produits'));
     }
     public function listetraiter(){
        // $produits = Auteur::with(['commandenvs', 'Produit'])->where('etat', 'nonlu')->get();
         $produits = Auteur::where('etat', 'traiter')
         ->with('commandenvs.produit') // Charger les commandes et les produits associés
        ->orderBy('created_at', 'desc')
         ->get();
        // dd($produits);
         return view('Notification.listenotif', compact('produits'));
     }

    public function lirenotif(Request $request){
        $aut = Auteur::find($request->id);
        if(strcasecmp($aut->etat, "nonlu") === 0 ){
        $aut->etat="lu";
        $aut->Update();
        }
        return response()->json([
            'success' => true,
            'message' => 'Element updated successfully!',
            'element' => $aut
        ]);
    }

    public function traiternotif(Request $request){
        $aut = Auteur::find($request->id);
        $aut->etat="traiter";
        $aut->Update();

        // Envoyer l'email de confirmation
        try {
            Mail::to($aut->email)->send(new OrderConfirmation($aut));
        } catch (\Exception $e) {
            // Log l'erreur si l'envoi échoue, mais ne bloque pas la validation
            \Log::error('Erreur lors de l\'envoi de l\'email de confirmation: ' . $e->getMessage());
        }

        return response()->json([
            'success' => true,
            'message' => 'Element updated successfully!',
            'element' => $aut
        ]);
    }

    public function count()
{
    $count = Auteur::where('etat', 'nonlu')->count();
    return response()->json(['count' => $count]);
}

    public function modcommande($id)
    {
        $commande = Auteur::findOrFail($id);
        return view('Commande.modcommande', compact('commande'));
    }

    public function updatecommande(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'numero' => 'required|string|max:255',
            'contact_what' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        $commande = Auteur::findOrFail($id);
        $commande->update($request->all());

        return redirect('/listecom')->with('successmod', 'Commande modifiée avec succès!');
    }

    public function Supprimercommande($id)
    {
        $commande = Auteur::findOrFail($id);
        $commande->delete();

        return redirect('/listecom')->with('successsupp', 'Commande supprimée avec succès!');
    }

}

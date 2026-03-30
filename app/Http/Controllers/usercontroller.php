<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use App\Models\Auteur;
use App\Models\Produit;
use App\Models\Image;
use App\Models\Categorie;

use App\Models\Produitcara;
use App\Models\Caracteristique;
use App\Models\Commandenv;
use App\Models\Publicite;
use App\Models\SousCategorie;
use Illuminate\Http\JsonResponse;
use App\Models\Commande;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Carbon\Carbon;

class usercontroller extends Controller
{
    //

    public function signin(){
        $souscategories1 = Categorie::orderBy('created_at', 'desc')
 ->get();
 $souscategories = Categorie::orderBy('created_at', 'desc')
                               ->limit(5)
                               ->get();
        return view('forminscription',compact('souscategories1','souscategories'));
    }

    public function FormUser(){
        return view('Utilisateurs.utilisateur');
    }


    public function logout(){
        Auth::logout();
        session()->forget('userInfo');
        session()->forget('cart');
        return redirect()->route('ListeP');
    }

    public function login(){
        $produits = Produit::with(['Caracteristique', 'SousCategorie', 'Images'])->get();
        $souscategories = Categorie::orderBy('created_at', 'desc')
                               ->limit(5)
                               ->get();
    $publicites = Publicite::all();

 $souscategories1 = Categorie::orderBy('created_at', 'desc')
 ->get();
    return view('formconnexion',compact('produits','souscategories','publicites','souscategories1'));

    }

    public function createuser(Request $request){

        $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'name' => 'required',

        ]);
        $perso=new user();
        $perso->name=$request->name;
        $perso->email=$request->email;
      $perso->password = Hash::make($request->password);
        $perso->statut="user";


        $perso->save();

        // Connecter automatiquement l'utilisateur après inscription
        Auth::login($perso);

        // Stocker les informations utilisateur en session
        $credentials = User::where('email','' .$request->email.'')->get();
        $request->session()->put('userInfo', $credentials);

        // Rediriger vers la page mon compte
        return redirect()->route('monCompte')->with('success', 'Inscription réussie ! Bienvenue sur votre compte.');

    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }


    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
           'statut' => "user",

        ]);
    }

public function loginuser(Request $request){

$usera=$request->validate([
 "email"=>["required"],
 "password"=>["required"]

]);

if(Auth::attempt($usera)){


$request->session()->regenerate();
$user = Auth::user(); // Récupérer l'utilisateur authentifié
$credentials = User::where('email','' .$request->email.'')->get();
// dd($credentials);
$request->session()->put('userInfo', $credentials);

// $myArray = $request->session()->get('userInfo', []);
// dd($credentials);
$userstat = $user->statut;
if($userstat=="user"){
return redirect()->route('monCompte');
}
elseif($userstat=="secretaire"){
    return redirect()->route('secretaire');
    }
    elseif($userstat=="admin"){
        return redirect()->route('admin');
        }
}
else{

    return redirect()->route('login')->with('fail', ' Identifiants incorrects, veuillez réessayer ');

}

// $utitilisateur=User::where("email",$usera["email"])->first();
// if(!$utitilisateur) return view('welcome');
// if(!Hash::check($usera["password"],$utitilisateur->password)){

//     return view('welcome');
// }
// else {
//     return redirect()->route('acceuill');

// }
    }

public function createAdmin()
{
    $admin = new User();
    $admin->name = "Admin";
    $admin->email = "admin@exemple.com";
    $admin->password = Hash::make("motdepasse123"); // mot de passe sécurisé
    $admin->statut = "admin";
    $admin->save();

    return "Administrateur créé avec succès !";
}

    public function getOptions()
{
    $options = User::all(['id', 'name']); // ou toute autre colonne nécessaire
    return response()->json($options);
}

public function createutilisateur(Request $request){

    $request->validate([
        'email' => 'required',
        'password' => 'required',
        'name' => 'required',
        'droit' =>'required',

    ]);
    $perso=new user();
    $perso->name=$request->name;
    $perso->email=$request->email;
    $perso->password=$request->password;
    $perso->statut=$request->droit;


    $perso->save();

    // $this->validator($request->all())->validate();

    // $user = $this->create($request->all());

    // // Connecter l'utilisateur ou rediriger
    // auth()->login($user);

    return redirect()->route('Utilisateur')->with('success', ' Successfully Sign in');
}

public function Liste(){
    $users = User::all();
    return view('Utilisateurs.ListeUtilisateur', compact('users'));
}

public function Supprimeruser($id){
    // $request->validate([
    //     'categorie' => 'required',
    // ]);
    $userid = User::find($id);
    $userid->delete();
    return redirect('ListUtilisateur')->with('status','Uttilisateur Supprimée avec succès');

}

    /**
     * Affiche la page Mon compte avec l'historique des transactions
     */
    public function monCompte()
    {
        $user = Auth::user();
        // Historique basé sur la structure existante: Auteur (entête) + Commandenv (lignes)
        $query = Auteur::where('user_id', $user->id)
            ->with(['commandenvs.produit'])
            ->orderBy('created_at', 'desc');

        // Filtre par période (?periode=30|90|365)
        $periode = request()->integer('periode');
        if (!empty($periode) && in_array($periode, [30, 90, 365], true)) {
            $dateMin = Carbon::now()->subDays($periode);
            $query->where('created_at', '>=', $dateMin);
        }

        $auteurs = $query->get();

        // Données pour header/footer
        $souscategories = Categorie::orderBy('created_at', 'desc')
            ->limit(5)
            ->get();
        $souscategories1 = Categorie::orderBy('created_at', 'desc')->get();

        return view('Utilisateurs.moncompte', [
            'auteurs' => $auteurs,
            'souscategories' => $souscategories,
            'souscategories1' => $souscategories1,
            'periodeActuelle' => $periode,
        ]);
    }

    /**
     * Téléchargement de la facture PDF d'une commande (Auteur),
     * aligné sur la méthode existante (vue 'recu' + variables cart/total/nom/...)
     */
    public function facture($id)
    {
        $user = Auth::user();
        $query = Auteur::where('id', $id)
            ->with(['commandenvs.produit']);

        // If user is authenticated, check ownership
        if ($user) {
            $query->where('user_id', $user->id);
        }

        $auteur = $query->firstOrFail();

        $cart = [];
        $total = 0;
        foreach ($auteur->commandenvs as $ligne) {
            $cart[] = [
                'libelle' => $ligne->produit->libelle,
                'prix' => $ligne->prix,
                'qttestock' => $ligne->qtte,
                'etat' => $ligne->etat,
            ];
            $total += ($ligne->prix * $ligne->qtte);
        }

        $nom = $auteur->nom ?? ($user ? $user->name : 'Client');
        $prenom = $auteur->prenom ?? '';
        $adresse = $auteur->contact_what ?? '';
        $phone = $auteur->numero ?? '';
        $annee = date('Y');
        $mois = date('m');
        $numeroFacture = 'FAC-' . str_pad($auteur->id, 3, '0', STR_PAD_LEFT) . '/' . $mois . '/' . $annee;

        // Create a safe filename by replacing slashes with dashes
        $safeFilename = 'facture_' . str_replace('/', '-', $numeroFacture) . '.pdf';

        $pdf = PDF::loadView('recu', compact('cart', 'total', 'nom', 'prenom', 'adresse', 'phone', 'numeroFacture'));
        $pdf->setPaper('A4', 'landscape');

        return $pdf->download($safeFilename)->withHeaders([
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="' . $safeFilename . '"',
            'Cache-Control' => 'no-cache, no-store, must-revalidate',
            'Pragma' => 'no-cache',
            'Expires' => '0',
        ]);
    }

    // Suppression de la fonctionnalité d'avatar (upload) selon demande

    /**
     * Send password reset link to user email
     */
    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => 'Un lien de réinitialisation a été envoyé à votre adresse email.'])
            : back()->withErrors(['email' => 'Erreur lors de l\'envoi du lien de réinitialisation.']);
    }

    /**
     * Reset user password
     */
    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(null);

                $user->save();
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', 'Votre mot de passe a été réinitialisé avec succès.')
            : back()->withErrors(['email' => 'Erreur lors de la réinitialisation du mot de passe.']);
    }

    public function submitContact(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Ici, vous pouvez ajouter la logique pour envoyer un email ou enregistrer le message
        // Par exemple, envoyer un email à l'administrateur

        // Pour l'instant, on redirige avec un message de succès
        return redirect()->route('contact')->with('success', 'Votre message a été envoyé avec succès. Nous vous contacterons bientôt.');
    }
}

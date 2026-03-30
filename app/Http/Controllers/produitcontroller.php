<?php

namespace App\Http\Controllers;

use App\Models\Auteur;
use App\Models\Produit;
use App\Models\Image;
use App\Models\Categorie;
use Artesaos\SEOTools\Facades\SEOTools;
use App\Models\Produitcara;
use App\Models\Caracteristique;
use App\Models\Commandenv;
use App\Models\Publicite;
use App\Models\SousCategorie;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Cache\RateLimiting\Limit;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\Twitter;
use Artesaos\SEOTools\Facades\JsonLd;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderConfirmation;

class produitcontroller extends Controller
{
    public function formproduct(){
        $categories = Categorie::all();
        $souscategories = SousCategorie::all();
        $options = Caracteristique::all();

        return view('produit/formproduit', ['categorie' => $categories,'caracteristique' => $options,'souscategories' => $souscategories]);
    }

    public function createinfo(){
        $souscategories = SousCategorie::all();
        $options = Caracteristique::all();

        return view('produit/CreateInfoProduit', ['souscategorie' => $souscategories,'caracteristique' => $options]);
    }

    public function AddProduit(Request $request)
    {
        $request->validate([
            'libelle' => 'required',
            'souscategorie' => 'required',
            'description' => 'required',
            'image' => 'nullable|array|min:1',
            'image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096',
            'caracteristique' => 'required|array|min:1',
            'excellantqtte' => 'required|integer|min:1',
            'bonqtte' => 'nullable|integer|min:0',
            'correctqtte' => 'nullable|integer|min:0',
            'excellantprix' => 'required|numeric|min:0',
            'bonprix' => 'nullable|numeric|min:0',
            'correctprix' => 'nullable|numeric|min:0',
            'etat' => 'required|in:neuf,bon,correct',
        ]);
        
        $catid = SousCategorie::where('id', $request->souscategorie)->value('categorie_id');

        $prod = new Produit();
        $prod->libelle             = $request->libelle;
        $prod->categorie_id        = $catid;
        $prod->souscategorie_id    = $request->souscategorie;
        $prod->description         = $request->description;
        $prod->qttestock           = $request->excellantqtte;
        $prod->qttestockbonetat    = $request->bonqtte ?? 0;
        $prod->prix                = $request->excellantprix;
        $prod->prixbonetat         = $request->bonprix ?? 0;
        $prod->prixetatcorrect     = $request->correctprix ?? 0;
        $prod->qttestocketatcorrect = $request->correctqtte ?? 0;
        $prod->etat                = $request->etat;

        $prod->save();

        $productId = $prod->id;

        // Gestion des images principales
        if ($request->hasFile('image')) {
            $productName = str_replace(' ', '_', strtolower($prod->libelle));

            $images = $request->file('image');
            $i = 0;
            $uploadErrors = [];

            foreach ($images as $file) {
                try {
                    $i++;
                    $extension = $file->getClientOriginalExtension();
                    $fileName = $productName . '_main_' . time() . '_' . $i . '.' . $extension;

                    $destination = public_path('photos');

                    // Créer le dossier avec les bonnes permissions
                    if (!file_exists($destination)) {
                        if (!mkdir($destination, 0755, true)) {
                            $uploadErrors[] = "Impossible de créer le dossier photos";
                            continue;
                        }
                    }

                    // Vérifier les permissions du dossier
                    if (!is_writable($destination)) {
                        $uploadErrors[] = "Le dossier photos n'est pas accessible en écriture";
                        continue;
                    }

                    // Déplacer le fichier
                    if ($file->move($destination, $fileName)) {
                        $img = new Image();
                        $img->nom = $fileName;
                        $img->produit_id = $productId;
                        $img->type = 'main'; // Type principal
                        $img->save();
                    } else {
                        $uploadErrors[] = "Échec du déplacement du fichier {$file->getClientOriginalName()}";
                    }

                } catch (\Exception $e) {
                    $uploadErrors[] = "Erreur lors de l'upload de {$file->getClientOriginalName()}: " . $e->getMessage();
                    // Log l'erreur pour debug
                    \Log::error('Erreur upload image produit: ' . $e->getMessage(), [
                        'product_id' => $productId,
                        'file' => $file->getClientOriginalName()
                    ]);
                }
            }

            // Si des erreurs d'upload, les afficher
            if (!empty($uploadErrors)) {
                return back()->with('success', 'Produit ajouté avec succès.')->with('upload_warnings', $uploadErrors);
            }
        }

        // Gestion des miniatures
        if ($request->hasFile('thumbnails')) {
            $productName = str_replace(' ', '_', strtolower($prod->libelle));

            $thumbnails = $request->file('thumbnails');
            $j = 0;
            $thumbnailErrors = [];

            foreach ($thumbnails as $file) {
                try {
                    $j++;
                    $extension = $file->getClientOriginalExtension();
                    $fileName = $productName . '_thumb_' . time() . '_' . $j . '.' . $extension;

                    $destination = public_path('photos');

                    // Créer le dossier avec les bonnes permissions
                    if (!file_exists($destination)) {
                        if (!mkdir($destination, 0755, true)) {
                            $thumbnailErrors[] = "Impossible de créer le dossier photos";
                            continue;
                        }
                    }

                    // Vérifier les permissions du dossier
                    if (!is_writable($destination)) {
                        $thumbnailErrors[] = "Le dossier photos n'est pas accessible en écriture";
                        continue;
                    }

                    // Déplacer le fichier
                    if ($file->move($destination, $fileName)) {
                        $img = new Image();
                        $img->nom = $fileName;
                        $img->produit_id = $productId;
                        $img->type = 'thumbnail'; // Type miniature
                        $img->save();
                    } else {
                        $thumbnailErrors[] = "Échec du déplacement du fichier {$file->getClientOriginalName()}";
                    }

                } catch (\Exception $e) {
                    $thumbnailErrors[] = "Erreur lors de l'upload de {$file->getClientOriginalName()}: " . $e->getMessage();
                    // Log l'erreur pour debug
                    \Log::error('Erreur upload miniature produit: ' . $e->getMessage(), [
                        'product_id' => $productId,
                        'file' => $file->getClientOriginalName()
                    ]);
                }
            }

            // Si des erreurs d'upload, les afficher
            if (!empty($thumbnailErrors)) {
                return back()->with('success', 'Produit ajouté avec succès.')->with('thumbnail_warnings', $thumbnailErrors);
            }
        }

        foreach ($request->caracteristique as $caractId) {
            $pc = new Produitcara();
            $pc->produit_id = $productId;
            $pc->caracteristique_id = $caractId;
            $pc->save();
        }

        return back()->with('success', 'Produit ajouté avec succès.');
    }

    public function modproduit(Request $request){
        $prod = Produit::find($request->id);
        $isOccasionOnly = in_array($prod->libelle, ['CLIMATISEURS WHIRLPOOL', 'CLIMATISEURS UP LIVE-MIDEA']);

        $rules = [
            'libelle' => 'required',
            'prix' => $isOccasionOnly ? 'nullable|numeric|min:0' : 'required|numeric|min:0',
            'prixbon' => 'nullable|numeric|min:0',
            'prixcorrect' => 'nullable|numeric|min:0',
            'etat' => 'required|in:neuf,bon,correct',
            'souscategorie' => 'required',
            'qtte' => 'required|integer|min:0',
            'qttebon' => 'nullable|integer|min:0',
            'qttecorrect' => 'nullable|integer|min:0',
            'description' => 'required',
        ];

        $request->validate($rules);

        $prod->libelle = $request->libelle;
        if ($isOccasionOnly) {
            $prod->prix = $request->prix ?? $prod->prix;
        } else {
            $prod->prix = $request->prix;
        }
        $prod->prixbonetat = $request->prixbon ?? $prod->prixbonetat;
        $prod->prixetatcorrect = $request->prixcorrect ?? $prod->prixetatcorrect;
        $prod->etat = $request->etat;
        $catid = SousCategorie::where('id', $request->souscategorie)->value('categorie_id');
        $prod->categorie_id = $catid;

        $prod->souscategorie_id = $request->souscategorie;
        $prod->qttestock = $request->qtte;
        $prod->qttestockbonetat = $request->qttebon ?? $prod->qttestockbonetat;
        $prod->qttestocketatcorrect = $request->qttecorrect ?? $prod->qttestocketatcorrect;
        $prod->description = $request->description;
        $prod->update();

        // Gestion des images principales
        if($request->filled('image_source') && $request->image_source === 'select' && $request->filled('existing_images')) {
            // Sélection d'images principales existantes
            Image::where('produit_id',$request->id)->where(function($q) {
                $q->where('type', 'main')->orWhereNull('type');
            })->delete();

            foreach($request->existing_images as $existingImage) {
                $imges = new Image();
                $imges->nom = $existingImage;
                $imges->produit_id = $request->id;
                $imges->type = 'main';
                $imges->save();
            }
        } elseif($request->hasFile('image') && is_array($request->file('image')) && count($request->file('image')) > 0){
            // Upload de nouvelles images principales
            Image::where('produit_id',$request->id)->where(function($q) {
                $q->where('type', 'main')->orWhereNull('type');
            })->delete();

            $images=$request->file('image');
            $IT=0;
            $productName = str_replace(' ', '_', strtolower($prod->libelle));

            foreach($images as $ims){
                $IT++;
                $imges=new Image();
                $extension = $ims->getClientOriginalExtension();

                $imagenew=$productName . '_main_' . time() . '_' . $IT . '.' . $extension;
                $ims->move(public_path('photos'), $imagenew);
                $imges->nom=$imagenew;
                $imges->produit_id=$request->id;
                $imges->type = 'main';
                $res4=$imges->save();
            }
        }

        // Gestion des miniatures
        if($request->filled('thumbnail_source') && $request->thumbnail_source === 'select' && $request->filled('existing_thumbnails')) {
            // Sélection de miniatures existantes
            Image::where('produit_id',$request->id)->where('type', 'thumbnail')->delete();

            foreach($request->existing_thumbnails as $existingThumbnail) {
                $thumb = new Image();
                $thumb->nom = $existingThumbnail;
                $thumb->produit_id = $request->id;
                $thumb->type = 'thumbnail';
                $thumb->save();
            }
        } elseif($request->hasFile('thumbnails') && is_array($request->file('thumbnails')) && count($request->file('thumbnails')) > 0){
            // Upload de nouvelles miniatures
            if (!$request->filled('add_to_existing_thumbnails')) {
                Image::where('produit_id',$request->id)->where('type', 'thumbnail')->delete();
            }

            $thumbnails=$request->file('thumbnails');
            $JT=0;
            $productName = str_replace(' ', '_', strtolower($prod->libelle));

            foreach($thumbnails as $thumb){
                $JT++;
                $thumbImg=new Image();
                $extension = $thumb->getClientOriginalExtension();

                $thumbnailNew=$productName . '_thumb_' . time() . '_' . $JT . '.' . $extension;
                $thumb->move(public_path('photos'), $thumbnailNew);
                $thumbImg->nom=$thumbnailNew;
                $thumbImg->produit_id=$request->id;
                $thumbImg->type = 'thumbnail';
                $thumbImg->save();
            }
        }

        if($request->filled('caracteristique')){
            Produitcara::where('produit_id',$request->id)->delete();
            $caracts=$request->caracteristique;

            foreach($caracts as $caractId){
                $caracter=new Produitcara();
                $maxIdc = Caracteristique::max('id');

                $caracter->produit_id=$request->id;
                $caracter->caracteristique_id=$caractId;

                $res5=$caracter->save();
            }
        }

        return redirect()->route('listep2')->with('statue','Produit Modifié avec succès');
    }

    public function ListeP(){
        $produits = Produit::with(['Caracteristique', 'SousCategorie', 'Images'])
        ->where(function($query) {
            $query->where('qttestock', '>', 0)
                  ->orWhere(function($q) {
                      $q->whereIn('libelle', ['CLIMATISEURS WHIRLPOOL', 'CLIMATISEURS UP LIVE-MIDEA'])
                        ->where('qttestockbonetat', '>', 0);
                  });
        })
        ->orderBy('created_at', 'desc')
        ->get();
        $souscategories = Categorie::orderBy('created_at', 'desc')
            ->limit(5)
            ->get();
        $souscategories1 = Categorie::orderBy('created_at', 'desc')
        ->get();
        $publicites = Publicite::all();
        $publicites = Publicite::actives()->get();
        return view('guestcontain', compact('produits','souscategories','publicites','souscategories1'));
    }

    public function produits(){
        $query = Produit::with(['Caracteristique', 'SousCategorie', 'Images']);

        if (request()->has('search') && !empty(request('search'))) {
            $search = request('search');
            $query->where('libelle', 'like', '%' . $search . '%');
        }

        // Filtre par prix
        if (request()->has('price_min') && !empty(request('price_min'))) {
            $query->where('prix', '>=', request('price_min'));
        }

        if (request()->has('price_max') && !empty(request('price_max'))) {
            $query->where('prix', '<=', request('price_max'));
        }

        // Tri des produits
        $sort = request('sort', 'pertinence');
        switch ($sort) {
            case 'price_asc':
                $query->orderBy('prix', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('prix', 'desc');
                break;
            case 'newest':
                $query->orderBy('created_at', 'desc');
                break;
            case 'popular':
                // Assuming popularity is based on stock quantity (higher stock = more popular)
                $query->orderBy('qttestock', 'desc');
                break;
            case 'pertinence':
            default:
                $query->orderBy('qttestock', 'desc');
                break;
        }

        // Afficher les produits avec pagination
        $produits = $query->paginate(15);

        // Modifier pour afficher toutes les catégories dans le filtre 
        $souscategories = Categorie::orderBy('created_at', 'desc')
            ->limit(5)
            ->get();
        $souscategories1 = Categorie::orderBy('created_at', 'desc')
        ->get();
        $publicites = Publicite::all();

        $searchTerm = request('search');

        // Configuration SEO
        $title = 'Nos Produits - ' . config('app.name');
        if (request()->has('search')) {
            $title = 'Recherche : ' . request('search') . ' - ' . config('app.name');
        }
        SEOTools::setTitle($title);
        SEOTools::setDescription('Découvrez notre sélection de produits de qualité. Trouvez les meilleurs articles pour vos besoins.');
        SEOTools::opengraph()->setTitle($title);
        SEOTools::opengraph()->setDescription('Découvrez notre sélection de produits de qualité. Trouvez les meilleurs articles pour vos besoins.');
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::opengraph()->setType('website');
        SEOTools::opengraph()->setSiteName(config('app.name'));

        if($produits->isNotEmpty() && $produits->first()->images->isNotEmpty()) {
            SEOTools::opengraph()->addImage(asset('photos/' . $produits->first()->images->first()->nom));
        }

        return view('produits', compact('produits','souscategories','publicites','souscategories1', 'searchTerm'));
    }

    public function searchprodupd($id){
        $produits = Produit::with(['images', 'sousCategorie'])->findOrFail($id);
        $souscategories = SousCategorie::all();
        $options = Caracteristique::all();
        return view('produit.formprodmod', compact('produits','souscategories','options'));
    }

    public function suprprodcard($id,$etat){
        $produits=session()->get('cart', []);
        $productKey = $id;
        if (isset($produits[$productKey])){
            unset($produits[$productKey]);
            session()->put('cart', $produits);

            if (request()->ajax()) {
                return response()->json(['success' => true, 'message' => 'Produit Supprimé du panier avec succès']);
            }

            return redirect()->route('cartshopping')->with('success','Produit Supprimé du panier avec succès');
        }

        if (request()->ajax()) {
            return response()->json(['success' => false, 'message' => 'Produit non trouvé dans le panier']);
        }

        return redirect()->back()->with('error', 'Produit non trouvé dans le panier');
    }

    public function update(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');
        $total=0;
        $cart = session()->get('cart', []);
        if (isset($cart[$productId])) {
            $cart[$productId]['qttestock'] = $quantity;
           $total=$quantity*$cart[$productId]['prix'];
        }
        session()->put('cart', $cart);

        return response()->json(['totalPrice' => $total]);
    }

    public function suprcart(Request $request)
    {
        session()->forget('cart');
        return redirect()->back()->with('success', 'Successfully deleted');
    }

    public function detailprod($id, Request $request)
    {
        $produits = Produit::with(['caracteristique', 'sousCategorie', 'images'])->findOrFail($id);

        // Correction encodage UTF-8 pour la description
        if (!mb_check_encoding($produits->description, 'UTF-8')) {
            $produits->description = mb_convert_encoding($produits->description, 'UTF-8', 'ISO-8859-1');
        }

        $isOccasionOnly = in_array($produits->libelle, ['CLIMATISEURS WHIRLPOOL', 'CLIMATISEURS UP LIVE-MIDEA']);
        if ($isOccasionOnly) {
            $etat = 'occasion';
        } else {
            $defaultEtat = 'neuve';
            $etat = $request->query('etat', $defaultEtat);
        }

        SEOTools::setTitle($produits->libelle);
        SEOTools::setDescription($produits->description);
        SEOTools::opengraph()->setTitle($produits->libelle);
        SEOTools::opengraph()->setDescription($produits->description);
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::opengraph()->setType('product');
        SEOTools::opengraph()->setSiteName(config('app.name'));

        if ($produits->images->isNotEmpty()) {
            $imageUrl = asset('photos/' . $produits->images->first()->nom);
            SEOTools::opengraph()->addImage($imageUrl);
        }

        // Récupérer des produits de la même catégorie ET sous-catégorie (sauf le produit actuel)
        $produitsSimilaires = Produit::where('categorie_id', $produits->categorie_id)
                                     ->where('souscategorie_id', $produits->souscategorie_id)
                                     ->where('id', '!=', $id)
                                     ->with('images')
                                     ->limit(10)
                                     ->get();

        $souscategories = Categorie::orderBy('created_at', 'desc')->take(5)->get();
        $souscategories1 = Categorie::orderBy('created_at', 'desc')->get();

        return view('produit.detailproduit', compact('produits', 'etat', 'souscategories', 'souscategories1', 'produitsSimilaires'));
    }

    public function produitcate($id, $nomCat)
    {
        $categorie = Categorie::findOrFail($id);
        $isOccasion = request()->is('occasion*');

        $query = Produit::where('categorie_id', $id);

        // Modifier pour afficher tous les produits de la catégorie (même avec stock à zéro)
        // Le filtrage par stock a été commenté pour afficher tous les produits
        /*
        if ($isOccasion) {
            $query->where('qttestockbonetat', '>', 0)
                  ->whereNotNull('prixbonetat');
        } else {
            $query->where('qttestock', '>', 0)
                  ->whereNotNull('prix');
        }
        */

        // Filtre par prix
        if (request()->has('price_min') && !empty(request('price_min'))) {
            if ($isOccasion) {
                $query->where('prixbonetat', '>=', request('price_min'));
            } else {
                $query->where('prix', '>=', request('price_min'));
            }
        }

        if (request()->has('price_max') && !empty(request('price_max'))) {
            if ($isOccasion) {
                $query->where('prixbonetat', '<=', request('price_max'));
            } else {
                $query->where('prix', '<=', request('price_max'));
            }
        }

        // Tri des produits
        $sort = request('sort', 'pertinence');
        $priceField = $isOccasion ? 'prixbonetat' : 'prix';
        switch ($sort) {
            case 'price_asc':
                $query->orderBy($priceField, 'asc');
                break;
            case 'price_desc':
                $query->orderBy($priceField, 'desc');
                break;
            case 'newest':
                $query->orderBy('created_at', 'desc');
                break;
            case 'popular':
                // Assuming popularity is based on stock quantity (higher stock = more popular)
                $stockField = $isOccasion ? 'qttestockbonetat' : 'qttestock';
                $query->orderBy($stockField, 'desc');
                break;
            case 'pertinence':
            default:
                $stockField = $isOccasion ? 'qttestockbonetat' : 'qttestock';
                $query->orderBy($stockField, 'desc');
                break;
        }

        // Afficher les produits avec pagination
        $produits = $query->with('SousCategorie', 'Images')->paginate(15);

        $publicites = Publicite::all();
        $souscategoriescat = SousCategorie::where('categorie_id', $id)->get();
        $categories = Categorie::orderBy('created_at', 'desc')->get();
        // Modifier pour afficher toutes les catégories (pas seulement 5)
        $souscategories = $categories;
        $souscategories1 = Categorie::orderBy('created_at', 'desc')->get();

        $message = null;
        if ($produits->isEmpty()) {
            $etat = $isOccasion ? 'en occasion' : 'en neuf';
            $message = "Désolé, aucun produit $etat disponible pour la catégorie « {$categorie->libelle} ».";
        }

        return view('produits', compact(
            'produits',
            'categories',
            'souscategories',
            'souscategoriescat',
            'publicites',
            'souscategories1',
            'message',
            'categorie'
        ));
    }

    public function produitsubcate($id)
    {
        $subcat = SousCategorie::findOrFail($id);

        // Afficher les produits avec pagination
        $produits = Produit::where('souscategorie_id', $id)
            ->where('categorie_id', $subcat->categorie_id)
            ->with('SousCategorie', 'Images')
            ->paginate(15);

        $publicites = publicite::all();
        $souscategoriescat = SousCategorie::where('categorie_id', $subcat->categorie_id)->get();
        $categories = Categorie::orderBy('created_at', 'desc')->get();
        $souscategories = $categories->take(5);

        return view('produits', compact(
            'produits',
            'categories',
            'souscategories',
            'souscategoriescat',
            'publicites',
            'souscategories1'
        ));
    }

    public function produitprix($range)
    {
        if (strpos($range, '+') !== false) {
            $min = (int) str_replace('+', '', $range);
            $max = null;
        } else {
            list($min, $max) = explode('-', $range);
            $min = (int) $min;
            $max = (int) $max;
        }

        $query = Produit::with(['Caracteristique', 'SousCategorie', 'Images'])
            ->where('qttestock', '>', 0);

        if ($max === null) {
            $query->where('prix', '>=', $min);
        } else {
            $query->whereBetween('prix', [$min, $max]);
        }

        // MODIF: 15 produits par page pour 3 lignes de 5 produits
        $produits = $query->orderBy('qttestock', 'desc')->paginate(15);

        $souscategories = Categorie::orderBy('created_at', 'desc')
            ->limit(5)
            ->get();
        $souscategories1 = Categorie::orderBy('created_at', 'desc')
            ->get();
        $publicites = Publicite::all();

        SEOTools::setTitle('Nos Produits - Prix ' . $range . ' FCFA - ' . config('app.name'));
        SEOTools::setDescription('Découvrez notre sélection de produits dans la gamme de prix ' . $range . ' FCFA.');
        SEOTools::opengraph()->setTitle('Nos Produits - Prix ' . $range . ' FCFA - ' . config('app.name'));
        SEOTools::opengraph()->setDescription('Découvrez notre sélection de produits dans la gamme de prix ' . $range . ' FCFA.');
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::opengraph()->setType('website');
        SEOTools::opengraph()->setSiteName(config('app.name'));

        if($produits->isNotEmpty() && $produits->first()->images->isNotEmpty()) {
            SEOTools::opengraph()->addImage(asset('photos/' . $produits->first()->images->first()->nom));
        }

        $selectedPriceRange = $range;

        return view('produits', compact('produits','souscategories','publicites','souscategories1', 'selectedPriceRange'));
    }

    public function addtocard($id){
        try {
            $produit = Produit::with(['Caracteristique', 'SousCategorie', 'Images'])->findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Produit non trouvé.'], 404);
        }

        $cart = session()->get('cart', []);
        $productKey = $id . '__neuve'; // Par défaut, on ajoute en état neuf

        if(isset($cart[$productKey])){
            $cart[$productKey]['qttestock']++;
            $newQuantity = $cart[$productKey]['qttestock'];
        } else {
            $prods = $produit->images->first();
            $cart[$productKey] = [
                "libelle" => $produit->libelle,
                "prix" => $produit->prix,
                "qttestock" => 1,
                "images" => $prods ? $prods->nom : '',
                "etat" => "neuve"
            ];
            $newQuantity = 1;
        }

        session()->put('cart', $cart);
        session()->save(); // Force save session

        // Calculer les totaux
        $totalQuantity = self::getCartCount();
        $totalle = 0;
        foreach ($cart as $item) {
            $totalle += ($item['qttestock'] * $item['prix']);
        }

        // Calculer le sous-total pour cet article spécifique
        $itemTotal = $newQuantity * $cart[$productKey]['prix'];

        // Return complete cart data for immediate UI update
        return response()->json([
            'success' => true,
            'quantity' => $newQuantity,
            'itemTotal' => $itemTotal,
            'grandTotal' => $totalle,
            'cartQuantity' => $totalQuantity,
            'cart' => $cart, // Include full cart data
            'addedProduct' => $cart[$productKey], // Include the added product details
            'productKey' => $productKey
        ]);
    }

    public function addtocard1($id, $etat)
    {
        $cart = session()->get('cart', []);
        try {
            $produit = Produit::with(['Caracteristique', 'SousCategorie', 'Images'])->findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Produit non trouvé.'], 404);
        }

        $productKey = $id . '__' . strtolower($etat);

        if(isset($cart[$productKey])){
            $cart[$productKey]['qttestock']++;
            $newQuantity = $cart[$productKey]['qttestock'];
        } else {
            $prods = $produit->images->first();
            $prix = ($etat === 'occasion') ? $produit->prixbonetat : $produit->prix;
            $cart[$productKey] = [
                "libelle" => $produit->libelle,
                "prix" => $prix,
                "qttestock" => 1,
                "images" => $prods->nom,
                "etat" => $etat
            ];
            $newQuantity = 1;
        }

        session()->put('cart', $cart);

        // Calculer les totaux
        $totalQuantity = self::getCartCount();
        $totalle = 0;
        foreach ($cart as $item) {
            $totalle += ($item['qttestock'] * $item['prix']);
        }

        // Calculer le sous-total pour cet article spécifique
        $itemTotal = $newQuantity * $cart[$productKey]['prix'];

        return response()->json([
            'success' => true,
            'quantity' => $newQuantity,
            'itemTotal' => $itemTotal,
            'grandTotal' => $totalle,
            'cartQuantity' => $totalQuantity,
        ]);
    }

    public function minusfromcard($id, $etat) {
        $cart = session()->get('cart', []);

        try {
            $produit = Produit::with(['Caracteristique', 'SousCategorie', 'Images'])->findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Produit non trouvé.'], 404);
        }

        $cartKey = $id . '__' . strtolower($etat);

        if (isset($cart[$cartKey]) && $cart[$cartKey]['qttestock'] > 1) {
            $cart[$cartKey]['qttestock']--;
            $newQuantity = $cart[$cartKey]['qttestock'];
        } else {
            // Si quantité = 1, on ne peut pas diminuer plus
            $newQuantity = $cart[$cartKey]['qttestock'] ?? 0;
        }

        session()->put('cart', $cart);

        // Calculer les totaux
        $totalQuantity = self::getCartCount();
        $totalle = 0;
        foreach ($cart as $item) {
            $totalle += ($item['qttestock'] * $item['prix']);
        }

        // Calculer le sous-total pour cet article spécifique
        $itemTotal = $newQuantity * $cart[$cartKey]['prix'];

        return response()->json([
            'success' => true,
            'quantity' => $newQuantity,
            'itemTotal' => $itemTotal,
            'grandTotal' => $totalle,
            'cartQuantity' => $totalQuantity,
        ]);
    }

    public function addtocart2(Request $request){
        $request->validate([
            'id' => 'required',
            'quantite' => 'required|integer|min:1',
            'etat' => 'required|string',
        ]);

        $id = $request->id;
        $qttep = $request->quantite;
        $etat = strtolower($request->etat); // Normaliser l'état en minuscules

        try {
            $produit = Produit::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            if ($request->ajax()) {
                return response()->json(['success' => false, 'error' => 'Produit non trouvé.'], 404);
            }
            return redirect()->back()->with('error', 'Produit non trouvé.');
        }

        $stockAvailable = 0;
        $prixcc = 0;
        $prods = $produit->images->first();

        // Gérer les différents états du produit
        if ($etat == "neuve" || $etat == "neuf") {
            $stockAvailable = $produit->qttestock ?? 0;
            $prixcc = $produit->prix ?? 0;
            $etat = "neuve"; // Normaliser
        } elseif ($etat == "occasion") {
            $stockAvailable = $produit->qttestockbonetat ?? 0;
            $prixcc = $produit->prixbonetat ?? 0;
        } elseif ($etat == "correctetat") {
            $stockAvailable = $produit->qttestocketatcorrect ?? 0;
            $prixcc = $produit->prixetatcorrect ?? 0;
        } else {
            // Par défaut, utiliser l'état neuf
            $stockAvailable = $produit->qttestock ?? 0;
            $prixcc = $produit->prix ?? 0;
            $etat = "neuve";
        }

        // Note: La vérification de stock a été retirée

        $cart = session()->get('cart', []);
        $productKey = $id.'__'.$etat;

        if (isset($cart[$productKey])) {
            $cart[$productKey]['qttestock'] += $qttep;
        } else {
            $cart[$productKey] = [
                "libelle" => $produit->libelle,
                "prix" => $prixcc,
                "qttestock" => $qttep,
                "images" => $prods ? $prods->nom : 'default.jpg',
                "etat" => $etat
            ];
        }

        session()->put('cart', $cart);

        $totalQuantity = self::getCartCount();

        // Toujours retourner du JSON pour les requêtes fetch
        return response()->json([
            'success' => true,
            'message' => 'Produit ajouté au panier avec succès !',
            'cartQuantity' => $totalQuantity,
            'cart' => $cart
        ]);
    }

    public function cartaff(){
        $produits=session()->get('cart', []);
        $myArray = session()->get('userInfo', []);

        if(empty($myArray)){
            $souscategories = Categorie::orderBy('created_at', 'desc')
                ->limit(5)
                ->get();
            $souscategories1 = Categorie::orderBy('created_at', 'desc')
                ->get();
            $auteur=$myArray;
            return view('cart', compact('produits','souscategories','auteur','souscategories1'));
        } else {
            $Array = $myArray->pluck('id')->all();
            $id =  implode(', ', $Array);
            $souscategories = Categorie::orderBy('created_at', 'desc')
                ->limit(5)
                ->get();
            $souscategories1 = Categorie::orderBy('created_at', 'desc')
                ->get();
            $auteur= Auteur::where('user_id', 'LIKE',''.$id.'')
                ->orderBy('created_at', 'desc')
                ->get();

            return view('cart', compact('produits','souscategories','auteur','souscategories1'));
        }
    }

    // Helper function to get cart count
    public static function getCartCount() {
        $cart = session()->get('cart', []);
        $totalCount = 0;
        foreach ($cart as $item) {
            $totalCount += $item['qttestock'] ?? 0;
        }
        return $totalCount;
    }

    public function Listep2(){
        $produits = Produit::with(['Caracteristique', 'Categorie', 'Images'])->get();
        $categories = Categorie::all();
        return view('produit.listeP', compact('produits','categories'));
    }
    
    public function tableinfo(){
        $produits = Produit::with(['Caracteristique', 'SousCategorie', 'Images'])->get();
        $souscategories = SousCategorie::all();
        return view('produit.tableInfoProduit', compact('produits','souscategories'));
    }

    public function ajoutcommandenv(Request $request){
        $cart = session()->get('cart', []);
        $user = session()->get('userInfo', []);

        $auteur=new Auteur();
        if (is_array($cart) && empty($cart)) {
            return redirect()->back()->with('fail','veuillez choisir vos produits');
        } else {
            // Split nom complet into nom and prenom if space exists
            $nomComplet = explode(' ', $request->nom, 2);
            $auteur->nom = $nomComplet[0] ?? $request->nom;
            $auteur->prenom = $nomComplet[1] ?? '';

            $auteur->numero = $request->telephone;
            $auteur->user_id = $user ? (is_object($user) ? ($user->first()->id ?? null) : (is_array($user) ? ($user[0]->id ?? null) : null)) : null;
            $auteur->email = $request->email;
            $auteur->contact_what = $request->ville . ', ' . $request->quartier . ', ' . $request->adresse ?? '';
            $auteur->etat = "nonlu";

            $auteur->save();
            $maxId = $auteur->id;

            foreach ($cart as $id => $productData) {
                if (strpos($id, "__") !== false) {
                    $parties = explode("__", $id);
                    if (count($parties) === 2) {
                        list($part, $maxIdff) = $parties;
                    }
                }
                
                $order = new Commandenv();
                $order->produit_id = $part;
                $order->auteur_id = $maxId;
                $order->etat = $productData['etat'];
                $order->prix = $productData['prix'];
                $order->qtte = $productData['qttestock'];
                $total=0;
                $total+=($productData['prix']*$productData['qttestock']);
                $order->save();
                
                $prod = Produit::find($part);
                if ($maxIdff == 'neuve') {
                    $prod->qttestock -= $order->qtte;
                } elseif ($maxIdff == 'occasion') {
                    $prod->qttestockbonetat -= $order->qtte;
                }
                $prod->save();
            }

            if(is_array($cart) && !empty($cart)){
                $cart = session()->get('cart', []);
                $nom = $request->nom;
                $prenom = $request->prenom;
                $phone = $request->phone;
                $adresse = $request->contact;
                $numeroFacture = 'FAC-' . str_pad(Commandenv::max('id') + 1, 5, '0', STR_PAD_LEFT);

                $pdf = PDF::loadView('recu', compact('cart','total','nom','prenom','adresse','phone','numeroFacture'));
                $pdf->setPaper('A4', 'landscape');

                $firstProductId = array_key_first($cart);
                list($productId) = explode("__", $firstProductId);

                // Send confirmation email to the customer
                try {
                    Mail::to($request->email)->send(new OrderConfirmation($auteur));
                } catch (\Exception $e) {
                    // Log the error but don't stop the order process
                    \Log::error('Failed to send order confirmation email: ' . $e->getMessage());
                }

                // Clear the cart after successful order
                session()->forget('cart');

                return redirect()->route('commande.success', ['id' => $maxId]);
            }

            return redirect()->back()->with('success','commande passée avec succes');
        }
    }

    public function index():JsonResponse
    {
        $notificationCount = Auteur::where('etat', 'nonlu')->count();
        $headerData = [
            'title' => $notificationCount,
        ];
        return response()->json($headerData);
    }

    public function cartupdate():JsonResponse
    {
        $quantity = session()->get('cart', []);
        $headerData = [
            'quantity' => $quantity,
        ];
        return response()->json($headerData);
    }

    public function ListePublicite()
    {
        $publicites = Publicite::orderBy('created_at', 'desc')->get();
        return view('Publicite.listePublicite', compact('publicites'));
    }

    public function formpublicite()
    {
        $produits = Produit::all();
        return view('Publicite.addpublicite', compact('produits'));
    }

    public function editpub($id)
    {
        $publicite = Publicite::findOrFail($id);
        return view('Publicite.modpub', compact('publicite'));
    }

    public function updatepub(Request $request, $id)
    {
        $publicite = Publicite::findOrFail($id);

        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'nullable|string',
            'prix_vente' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'reduction' => 'nullable|numeric|min:0|max:100',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut',
            'actif' => 'required|boolean',
        ]);

        if($request->hasFile('image')){
            if($publicite->image && file_exists(public_path('photos/' . $publicite->image))){
                unlink(public_path('photos/' . $publicite->image));
            }

            $image = $request->file('image');
            $imagename = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('photos'), $imagename);
            $publicite->image = $imagename;
        }

        $publicite->titre = $request->titre;
        $publicite->description = $request->description;
        $publicite->prix_vente = $request->prix_vente;
        $publicite->reduction = $request->reduction;
        $publicite->date_debut = $request->date_debut;
        $publicite->date_fin = $request->date_fin;
        $publicite->actif = $request->actif;

        $publicite->save();

        return redirect()->route('listepublicite')->with('successaddp', 'Publicité modifiée avec succès âÂÂ');
    }

    public function addpub(Request $request)
    {
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'nullable|string',
            'reduction' => 'nullable|numeric|min:0',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut',
            'actif' => 'required|boolean',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:4096'
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $destination = public_path('photos');
            if (!File::exists($destination)) {
                File::makeDirectory($destination, 0775, true);
            }
            $image->move($destination, $imageName);
            $validated['image'] = $imageName;
        }

        Publicite::create($validated);

        return redirect()->back()->with('success', 'Publicité ajoutée avec succès âÂÂ');
    }

    public function Supprimerpub($id)
    {
        $publicite = Publicite::findOrFail($id);
        $filePath = public_path('photos/' . $publicite->nom);
        if (File::exists($filePath)) {
            File::delete($filePath);
        }
        $publicite->delete();

        return redirect('/listepublicite')->with('status', 'Publicité supprimée avec succès ðÂÂÂï¸Â');
    }

    public function SupprimerProduit($id){
        $prodiut = Produit::find($id);
        $prodiut->delete();
        return redirect()->back()->with('status','Produit Supprimée avec succès');
    }

    public function deleteImage($id)
    {
        $image = Image::findOrFail($id);
        $filePath = public_path('photos/' . $image->nom);

        // Supprimer le fichier physique
        if (File::exists($filePath)) {
            File::delete($filePath);
        }

        // Supprimer l'enregistrement de la base de données
        $image->delete();

        return response()->json(['success' => true, 'message' => 'Image supprimée avec succès.']);
    }

    public function search(Request $request)
    {
        try {
            $query = trim($request->input('query', ''));

            \Log::info('Search called with query: ' . $query);

            if (empty($query)) {
                return response()->json([]);
            }

            $products = Produit::where(function($q) use ($query) {
                    $q->where('libelle', 'like', "%{$query}%")
                    ->orWhereHas('categorie', function($qc) use ($query) {
                        $qc->where('nomCat', 'like', "%{$query}%");
                    })
                    ->orWhereHas('souscategorie', function($qs) use ($query) {
                        $qs->where('nomsubCat', 'like', "%{$query}%");
                    });
                })
                ->with(['categorie', 'souscategorie', 'images'])
                ->select('id', 'libelle', 'prix', 'description')
                ->limit(10)
                ->get();

            \Log::info('Search found ' . $products->count() . ' products');

            return response()->json($products);
        } catch (\Exception $e) {
            \Log::error('Search error: ' . $e->getMessage());
            return response()->json(['error' => 'Erreur de recherche serveur'], 500);
        }
    }

    public function show($id)
    {
        $produit=produit::where('id',$id)->firstorfail();

        SEOTools::setTitle($produit->libelle);
        SEOTools::setDescription($produit->description);
        SEOTools::setCanonical(route('produit.show', $produit->id));
        SEOTools::opengraph()->setUrl(route('produit.show', $produit->id));
        SEOTools::opengraph()->setType('product');
        SEOTools::opengraph()->setDescription($produit->description);
        SEOTools::opengraph()->setSiteName(config('app.name'));

        return view('produit.detailproduit', compact('produit','products','souscategories','souscategories1'));
    }

    public function accueil()
    {
        $produits = Produit::with(['Caracteristique', 'SousCategorie', 'Images'])
            ->where('qttestock', '>', 0)
            ->orderBy('qttestock', 'desc')
            ->get();
        $souscategories = Categorie::orderBy('created_at', 'desc')
            ->limit(5)
            ->get();
        $souscategories1 = Categorie::orderBy('created_at', 'desc')
            ->get();
        $publicites = Publicite::actives()->get();

        $publicites = Publicite::with('categorie')
            ->where('actif', 1)
            ->whereDate('date_debut', '<=', now())
            ->whereDate('date_fin', '>=', now())
            ->get();

        return view('guestcontain', compact('produits','souscategories','publicites','souscategories1'));
    }

    public function showCarousel()
    {
        $publicites = Publicite::with('categorie')->get();
        $publicites = Publicite::where('actif', 1)->get();
        return view('guestcontain', compact('publicites'));
    }

    public function getProductsForDevis()
    {
        $products = Produit::where('qttestock', '>', 0)
            ->with(['images', 'categorie'])
            ->select('id', 'libelle', 'prix', 'description')
            ->limit(20)
            ->get()
            ->map(function ($product) {
                return [
                    'id' => $product->id,
                    'libelle' => $product->libelle,
                    'prix' => $product->prix,
                    'description' => $product->description,
                    'images' => $product->images->first() ? [$product->images->first()] : [],
                    'categorie' => $product->categorie ? $product->categorie->nom : null,
                ];
            });

        return response()->json($products);
    }

    public function handleSearch(Request $request)
    {
        $query = trim($request->input('query'));

        if (empty($query)) {
            return redirect('/produits');
        }

        $exactMatch = Produit::where('libelle', 'like', $query)
            ->where('qttestock', '>', 0)
            ->first();

        if ($exactMatch) {
            return redirect()->route('detailprod', ['id' => $exactMatch->id]);
        }

        $similarProducts = Produit::where('libelle', 'like', '%' . $query . '%')
            ->where('qttestock', '>', 0)
            ->exists();

        if ($similarProducts) {
            return redirect('/produits?search=' . urlencode($query));
        }

        return redirect('/produits?no_results=1&search_term=' . urlencode($query));
    }
}
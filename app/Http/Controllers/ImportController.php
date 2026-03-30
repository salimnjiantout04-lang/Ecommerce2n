<?php

namespace App\Http\Controllers;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use App\Models\Produit;
use Illuminate\Support\Facades\Storage;

class ImportController extends Controller
{
// creer le 01/10/2025 pour pouvoir importer les produits avec images depuis un fichier excel
    public function index()
{
    $produits = Produit::all();
    return view('produits.index', compact('produit'));
}

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xls,xlsx'
        ]);

        $file = $request->file('file')->getRealPath();
        $spreadsheet = IOFactory::load($file);
        $sheet = $spreadsheet->getActiveSheet();
        $rows = $sheet->toArray();

        $drawings = $sheet->getDrawingCollection();
        $imagesMap = [];

       $spreadsheet = IOFactory::load($file);
$sheet = $spreadsheet->getActiveSheet();

foreach ($sheet->getDrawingCollection() as $drawing) {
    if ($drawing instanceof Drawing) {
        $path = $drawing->getPath(); // Chemin vers l'image temporaire
        $coordinate = $drawing->getCoordinates(); // La cellule de l'image

        // Exemple : déplacer l'image vers ton dossier public
        $newName = 'photos/' . uniqid() . '_' . basename($path);
        copy($path, public_path($newName));
    }

        foreach ($rows as $index => $row) {
            if ($index == 0) continue; // skip header

            $rowNumber = $index + 1;

            Produit::create([
                'libelle' => $row[0] ?? '',
                'categorie_id' => $row[1] ?? null,
                'description' => $row[2] ?? '',
                'qttestock' => $row[3] ?? 0,
               'qttestockbonetat' => $row[4] ?? 0,
                'prix' => $row[5] ?? 0,
                'prixbonetat' => $row[6] ?? 0,
                'photos' => $imagesMap[$rowNumber] ?? null // si ton modèle a une colonne image
            ]);
        }

        return back()->with('success', 'Produits importés avec succès !');
    }
}
}
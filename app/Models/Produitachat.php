<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produitachat extends Model
{
    use HasFactory;
    protected $fillable = ['produit_id','achat_id','prixa','qtte','etat','prixv'];

//     <script>
// document.addEventListener("DOMContentLoaded", function() {
//     // Fonction pour recharger le contenu du header
//     function reloadHeader() {
//         fetch('{{ route('header.content') }}')
//             .then(response => response.text())
//             .then(html => {
//                 // Remplacer le contenu du header avec la nouvelle réponse
//                 document.getElementById('header-container').innerHTML = html;
//             })
//             .catch(error => console.error('Erreur lors du rechargement du header:', error));
//     }

//     // Recharger le header toutes les 30 secondes
//     setInterval(reloadHeader, 30000);

//     // Recharger le header immédiatement au chargement de la page
//     reloadHeader();
// });
// </script>
// <div id="header-container">
//     @include('partials.header')
// </div>

// document.addEventListener("DOMContentLoaded", function() {
//     // Fonction pour recharger le contenu du header
//     function reloadHeader() {
//         fetch('{{ route('header.content') }}')
//             .then(response => response.text())
//             .then(html => {
//                 // Remplacer le contenu du header avec la nouvelle réponse
//                 document.getElementById('header-container').innerHTML = html;
//             })
//             .catch(error => console.error('Erreur lors du rechargement du header:', error));
//     }

//     // Recharger le header toutes les 30 secondes
//     setInterval(reloadHeader, 30000);

//     // Recharger le header immédiatement au chargement de la page
//     reloadHeader();
// });
}

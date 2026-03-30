<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publicite extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'description',
        'prix_vente',  // AJOUT DU PRIX
        'image',
        'data',
        'reduction',
        'date_debut',
        'date_fin',
        'actif'
    ];

    // Cast pour s'assurer que les types sont corrects
    protected $casts = [
        'prix_vente' => 'decimal:2',
        'reduction' => 'decimal:2',
        'date_debut' => 'date',
        'date_fin' => 'date',
        'actif' => 'boolean',
    ];

    // Scope pour récupérer uniquement les publicités actives
    public function scopeActives($query)
    {
        return $query->where('actif', true)
                     ->whereDate('date_debut', '<=', now())
                     ->whereDate('date_fin', '>=', now());
    }

    // Relation avec la catégorie
    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'id_categorie');
    }

    // Accesseur pour calculer le prix après réduction
    public function getPrixApresReductionAttribute()
    {
        if ($this->reduction > 0) {
            return $this->prix_vente - ($this->prix_vente * $this->reduction / 100);
        }
        return $this->prix_vente;
    }

    // Accesseur pour formater le prix de vente
    public function getPrixVenteFormateAttribute()
    {
        return number_format($this->prix_vente, 0, ',', ' ') . ' FCFA';
    }

    // Accesseur pour formater le prix après réduction
    public function getPrixApresReductionFormateAttribute()
    {
        return number_format($this->prix_apres_reduction, 0, ',', ' ') . ' FCFA';
    }

    // Vérifier si la publicité a une réduction
    public function hasReduction()
    {
        return $this->reduction > 0;
    }


}

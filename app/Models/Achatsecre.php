<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achatsecre extends Model
{
    use HasFactory;

    protected $fillable = ['prixv','qtte','etat','produit_id'];

    public function produit(){
        return $this->belongsTo(Produit::class);
    }
}

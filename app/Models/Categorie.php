<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;

    protected $fillable = ['nomCat'];

    

    public function souscategorie(){
        return $this->hasMany(SousCategorie::class);
    }
    public function produit(){
        return $this->hasMany(Produit::class);
    }

    // public function subcateg(){
    //     return $this->belongsTo(Subcateg::class);
    // }
}

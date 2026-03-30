<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commandenv extends Model
{
    use HasFactory;

    protected $fillable = ['prix','qtte','etat','auteur_id','produit_id'];


    public function auteur(){
        return $this->belongsTo(Auteur::class);
    }

    public function produit(){
        return $this->belongsTo(Produit::class);
    }
}

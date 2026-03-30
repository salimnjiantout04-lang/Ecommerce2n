<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Infosproduit extends Model
{
    use HasFactory;
    protected $fillable = ['produit_id','etat_produit','prix','qttestock'];

    public function produit(){
        return $this->belongsTo(Produit::class);
    }

}

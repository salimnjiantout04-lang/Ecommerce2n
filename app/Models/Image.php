<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['nom','produit_id','type'];

    public function produit(){
        return $this->belongsTo(Produit::class);
    }
}

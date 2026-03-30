<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcateg extends Model
{
    use HasFactory;

    protected $fillable = ['nomsubCat'];

    public function categories(){
        return $this->hasMany(Categorie::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produits extends Model
{
    use HasFactory;

    public function catalogue()
    {
        return $this->belongsToMany(Catalgoue::class, 'catalogue_produits');
    }

    public function categories()
    {
        return $this->belongsToMany(Categories::class, 'produits_categories');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produits extends Model
{
    use HasFactory;

    protected $table = 'produits';

    public function catalogues()
    {
        return $this->belongsToMany(Catalogue::class, 'catalogue_produits');
    }

    public function categories()
    {
        return $this->belongsToMany(Categories::class, 'produits_categories');
    }
}

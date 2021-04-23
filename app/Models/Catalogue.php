<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalogue extends Model
{
    use HasFactory;

    protected $table = 'catalogue';

    public function produits()
    {
        return $this->belongsToMany(Produits::class, 'catalogue_produits');
    }
}

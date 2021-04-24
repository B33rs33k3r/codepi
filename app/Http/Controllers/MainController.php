<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catalogue;
use App\Models\Produits;
use App\Models\Categories;

class MainController extends Controller
{
    public function index()
    {
        $catalogues = Catalogue::with([
            'produits' => function($query) {
                $query->where('produits.active', 1);
            },
            'produits.categories' => function($query) {
                $query->where('categories.active', 1);
            }
        ])
        ->where('active', 1)
        ->get();

        return view('main', ['catalogues' => $catalogues]);
    }

    public function products()
    {
        $produits = Produits::where('active', 1)->get();

        return view('products', ['produits' => $produits]);
    }

    public function categories()
    {
        $categories = Categories::where('active', 1)->get();

        return view('categories', ['categories' => $categories]);
    }
}

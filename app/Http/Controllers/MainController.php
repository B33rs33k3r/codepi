<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catalogue;

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
}

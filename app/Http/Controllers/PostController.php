<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produits;
use App\Models\Categories;

class PostController extends Controller
{
    public function product(Request $request)
    {
        $validated = $request->validate([
            'id' => ['required', 'numeric'],
            'carac1' => ['required', 'string', 'max:510'],
            'carac2' => ['required', 'string', 'max:255'],
            'carac3' => ['required', 'string', 'max:999']
        ]);

        $product = new Produits();

        if ((int)$request->id > 0)
            $product = Produits::find((int)$request->id);

        $product->carac1 = $request->carac1;
        $product->carac2 = $request->carac2;
        $product->carac3 = (int)$request->carac3;
        $product->save();

        return $product->toJson();
    }

    public function category(Request $request)
    {
        $validated = $request->validate([
            'id' => ['required', 'numeric'],
            'name' => ['required', 'string', 'max:510']
        ]);

        $category = new Categories();

        if ((int)$request->id > 0)
            $category = Categories::find((int)$request->id);

        $category->name = $request->name;
        $category->save();

        return $category->toJson();
    }

    public function productDelete(Request $request)
    {
        $validated = $request->validate([
            'id' => ['required', 'numeric']
        ]);

        $product = Produits::find((int)$request->id);
        $product->active = 0;
        $product->save();

        return $product->toJson();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catalog;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with(['categories', 'catalogs'])->get();
        $categories = Category::all();
        $catalogs = Catalog::all();

        return view(
            'product',
            [
                'catalogs' => $catalogs,
                'products' => $products,
                'categories' => $categories
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'carac1' => ['required', 'string', 'max:510'],
            'carac2' => ['required', 'string', 'max:255'],
            'carac3' => ['required', 'numeric', 'max:999'],
            'attach_catalogs' => ['array'],
            'attach_catalogs.*' => ['numeric', 'min:1'],
            'detach_catalogs' => ['array'],
            'detach_catalogs.*' => ['numeric', 'min:1'],
            'attach_categories' => ['array'],
            'attach_categories.*' => ['numeric', 'min:1'],
            'detach_categories' => ['array'],
            'detach_categories.*' => ['numeric', 'min:1']
        ]);

        $product = Product::findOrFail($id);
        $product->carac1 = $request->carac1;
        $product->carac2 = $request->carac2;
        $product->carac3 = (int)$request->carac3;

        if (!empty($request->attach_catalogs))
            $product->catalogs()->attach($request->attach_catalogs);

        if (!empty($request->detach_catalogs))
            $product->catalogs()->detach($request->detach_catalogs);

        if (!empty($request->attach_categories))
            $product->categories()->attach($request->attach_categories);

        if (!empty($request->detach_categories))
            $product->categories()->detach($request->detach_categories);

        $product->save();

        return response()->json([
            'message' => 'Update complete successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return response()->json([
            'message' => "Deletion complete successfully"
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catalog;
use App\Models\Product;
use App\Models\Category;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

Use App\Factories\ProductUpdateFactory;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
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
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $product = new Product();
        $product->carac1 = $request->carac1;
        $product->carac2 = $request->carac2;
        $product->carac3 = (int)$request->carac3;
        $product->save();

        if (!empty($request->catalogs))
            $product->catalogs()->attach($request->catalogs);

        if (!empty($request->categories))
            $product->categories()->attach($request->categories);

        $product->save();
        $product->catalogs;
        $product->categories;

        return response()->json([
            'message' => "Insertion complete successfully",
            'product' => $product
        ]);
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
     * @param  \App\Htpp\Requests\UpdateProductRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->carac1 = $request->carac1;
        $product->carac2 = $request->carac2;
        $product->carac3 = (int)$request->carac3;

        $catalogDetachIds = $product->catalogs->whereNotIn('id', $request->catalogs)->pluck('id')->toArray();
        if (!empty($catalogDetachIds))
            $product->catalogs()->detach($catalogDetachIds);

        $requestedCatalogIds = $request->catalogs;
        $catalogIds = $product->catalogs->whereIn('id', $request->catalogs)->pluck('id')->toArray();
        ProductUpdateFactory::filter($catalogIds, $requestedCatalogIds);
        if (!empty($requestedCatalogIds))
            $product->catalogs()->attach($requestedCatalogIds);

        $categoryDetachIds = $product->categories->whereNotIn('id', $request->categories)->pluck('id')->toArray();
        if (!empty($categoryDetachIds))
            $product->categories()->detach($categoryDetachIds);

        $requestedCategoryIds = $request->categories;
        $categoryIds = $product->categories->whereIn('id', $request->categories)->pluck('id')->toArray();
        ProductUpdateFactory::filter($categoryIds, $requestedCategoryIds);
        if (!empty($requestedCategoryIds))
            $product->categories()->attach($requestedCategoryIds);

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

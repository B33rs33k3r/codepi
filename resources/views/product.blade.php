
@extends('welcome')

@section('content')

    <div class="grid-x product-grid">
        <div class="cell small-12 medium-10 large-8">
            <product-list
                :catalog_list="{{ $catalogs->toJson() }}"
                :product_list="{{ $products->toJson() }}"
                :category_list="{{ $categories->toJson() }}">
            </product-list>
        </div>
    </div>

@endsection

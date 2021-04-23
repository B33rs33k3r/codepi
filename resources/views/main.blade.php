
@extends('welcome')

@section('content')

    <div class="max-w-12xl mx-auto sm:px-12 lg:px-12">
        <div class="flex justify-center pt-10 sm:justify-start sm:pt-10">
            <a href="/">Home</a>
            <a href="/products">Produits</a>
            <a href="/categories">Categories</a>
        </div>
    </div>

    <div class="max-w-12xl mx-auto sm:px-12 lg:px-12">
        <div class="flex justify-center pt-10 sm:justify-start sm:pt-10">
            @foreach($catalogues as $catalogue)
                <div class="catalogue">
                    <div>
                        <p>Catalogue {{ $catalogue->id }}</p>
                    </div>

                    <div>
                        <ul>
                            @foreach($catalogue->produits as $produit)
                                <li class="product-container">
                                    <product :produit="{{ $produit->toJson() }}"></product>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="flex justify-center pt-10 sm:justify-start sm:pt-10">
            
        </div>
    </div>

@endsection
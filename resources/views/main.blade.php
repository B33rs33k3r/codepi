
@extends('welcome')

@section('content')

    <div class="max-w-12xl mx-auto sm:px-12 lg:px-12">
        <div class="flex justify-center pt-10 sm:justify-start sm:pt-10">
            @foreach($catalogues as $catalogue)
                <div>
                    <div>
                        <p>Catalogue {{ $catalogue->id }}</p>
                    </div>

                    <div>
                        <ul>
                            @foreach($catalogue->produits as $produit)
                                <li>
                                    <div>
                                        <p>Produit {{ $produit->id }}</p>
                                    </div>
                                    <div>
                                        <div>
                                            <p>1er caracteristique: {{ $produit->carac1 }}</p>
                                        </div>
                                        
                                        <div>
                                            <p>2eme caracteristique: {{ $produit->carac2 }}</p>
                                        </div>

                                        <div>
                                            <p>3eme caracteristique: {{ $produit->carac3 }}</p>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
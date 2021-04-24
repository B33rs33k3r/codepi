
@extends('welcome')

@section('content')

    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        <div class="max-w-12xl mx-auto sm:px-12 lg:px-12">
            <div class="flex justify-center pt-12 sm:justify-start sm:pt-12">
                @foreach($catalogues as $catalogue)
                    <div class="catalogue">
                        <div>
                            <p>Catalogue {{ $catalogue->id }}</p>
                        </div>

                        <div>
                            <ul>
                                @foreach($catalogue->produits as $product)
                                    <li>
                                        <div class="product-container">
                                            <div>
                                                <p>Produit {{ $product->id }}</p>
                                            </div>

                                            <div>
                                                <div>
                                                    <p>1er Caracterisque: <span class="bold">{{ $product->carac1 }}</span></p>
                                                </div>

                                                <div>
                                                    <p>2eme Caracterisque: <span class="bold">{{ $product->carac2 }}</span></p>
                                                </div>

                                                <div>
                                                    <p>3eme Caracterisque: <span class="bold">{{ $product->carac3 }}</span></p>
                                                </div>

                                                <div>
                                                    <div>
                                                        <p>Categories:</p>
                                                    </div>

                                                    <div>
                                                        <ul>
                                                            @foreach($product->categories as $category)
                                                                <li>
                                                                    <span class="bold">{{ $category->name }}</span>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
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
    </div>

@endsection
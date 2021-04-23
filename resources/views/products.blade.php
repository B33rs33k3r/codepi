
@extends('welcome')

@section('content')

    <div class="container">
        <div>
            <div>
                <product-container :products="{{ $produits->toJson() }}"></product-container>
            </div>

            <div class="flex justify-center pt-10 sm:justify-start sm:pt-10">
                
            </div>
        </div>
    </div>

@endsection
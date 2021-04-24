
@extends('welcome')

@section('content')

    <div class="container">
        <div>
            <div>
                <product-container :products="{{ $produits->toJson() }}"></product-container>
            </div>
        </div>
    </div>

@endsection
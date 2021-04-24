
@extends('welcome')

@section('content')

<div class="container">
    <div>
        <div>
            <categories-container :categories="{{ $categories->toJson() }}"></categories-container>
        </div>
    </div>
</div>

@endsection
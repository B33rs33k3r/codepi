@extends('welcome')

@section('content')


<div class="grid-x home-grid">
    <div class="cell small-12 medium-12 large-12 title">
        <p>{{ __('home.title') }}</p>
    </div>

    <nav class="cell small-12 medium-10 large-6">
        <ul class="grid-x grid-padding-x grid-padding-y">
            <li class="cell small-12 medium-4 large-4">
                <a href="/catalog">{{ __('home.nav.catalog') }}</a>
            </li>
            <li class="cell small-12 medium-4 large-4">
                <a href="/product">{{ __('home.nav.product') }}</a>
            </li>
            <li class="cell small-12 medium-4 large-4">
                <a href="/category">{{ __('home.nav.category') }}</a>
            </li>
        </ul>
    </nav>
</div>

@endsection
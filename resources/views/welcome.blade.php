<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{  __('meta.title') }} | {{ __('navigation.' . Route::currentRouteName()) }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/foundation-sites@6.6.3/dist/css/foundation.min.css" integrity="sha256-ogmFxjqiTMnZhxCqVmcqTvjfe1Y/ec4WaRj/aQPvn+I=" crossorigin="anonymous">

        <!-- font-awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />

        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/app.css') }}">
    </head>

    @php $routeClass = str_replace('.', '-', Route::currentRouteName()); @endphp

    <body>
        <div id="app" class="page-{{ $routeClass }}">
            <div class="grid-container fluid app-grid">
                @if(Route::Current()->uri != '/')
                    <div class="top-bar">
                        <div class="top-bar-left">
                            <ul class="dropdown menu" data-dropdown-menu>
                                <li class="menu-text">{{ __('home.title') }}</li>
                                <li><a href="/catalog">{{ __('navigation.catalog.index') }}</a></li>
                                <li><a href="/product">{{ __('navigation.product.index') }}</a></li>
                                <li><a href="/category">{{ __('navigation.category.index') }}</a></li>
                            </ul>
                        </div>

                        <div class="top-bar-right">
                        </div>
                    </div>
                @endif

                @yield('content')
            </div>
        </div>

        <script type="text/javascript" src="{{ URL::asset('js/app.js') }}"></script>
    </body>
</html>

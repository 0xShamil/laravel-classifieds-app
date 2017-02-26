<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        @include('layouts.partials._head')
    </head>
    <body>
        <div id="app">

            @include('layouts.partials._navigation')

            <div class="container">
                @include('layouts.partials._alerts')
                @yield('content')
            </div>
            
        </div>

        <!-- Scripts -->
        <script src="/js/app.js"></script>
    </body>
</html>

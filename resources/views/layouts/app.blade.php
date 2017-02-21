<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        @include('layouts.partials._head')
    </head>
    <body>
        <div id="app">

            @include('layouts.partials._navigation')

            @yield('content')
        </div>

        <!-- Scripts -->
        <script src="/js/app.js"></script>
    </body>
</html>

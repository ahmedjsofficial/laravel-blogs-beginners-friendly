<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Blog App</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style type="text/css">
        input::placeholder {
            color: #fff !important;
        }
    </style>
</head>

<body>
    <div id="app">
        @include('includes.navbar')
        <div class="mt-5">
            <div class="container">
                <div class="my-5 text-center text-danger">
                    <h1>@yield('title')</h1>
                </div>
                @include('includes.alert')
                @yield('content')

            </div>
        </div>


        <script src="https://cdn.ckeditor.com/4.17.2/standard/ckeditor.js"></script>
        <script>
            CKEDITOR.replace('editor1');
        </script>
    </div>
</body>

</html>
<!doctype html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">

    <head>
        <meta charset="utf-8" />
        <title>@yield("title", config("app.name"))</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="@yield("meta_description", "") name="description" ">
        <meta content="" name="author" />

        <link rel="shortcut icon" href="{{ asset("assets/img/favicon.png") }}" type="image/png">

        @include("components.admin._metaHead")

        @stack("css")

        <!-- Scripts -->
        @vite(["resources/css/app.css", "resources/js/app.js"])
    </head>

    <body class="auth-body-bg">
        <div class="home-btn d-none d-sm-block">
            <a href="/"><i class="text-white mdi mdi-home-variant h2"></i></a>
        </div>

        <div class="p-0 container-fluid bg-secondary">


            @yield("content")


        </div>



        <!-- JAVASCRIPT -->
        @include("components.admin._metaScript")

        @stack("javascript")
    </body>

</html>

<!doctype html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">

    <head>
        <meta charset="utf-8" />
        <title>@yield("title", config("app.name"))</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="@yield("meta_description", "") name="description" ">
        <meta content="" name="author" />

        @include("components.admin._metaHead")

        @yield("css")

        <!-- Scripts -->
        @vite(["resources/css/app.css", "resources/js/app.js"])
    </head>

    <body class="auth-body-bg">
        <div class="home-btn d-none d-sm-block">
            <a href="/"><i class="mdi mdi-home-variant h2 text-white"></i></a>
        </div>

        <div class="container-fluid p-0 bg-secondary">


            @yield("content")


        </div>



        <!-- JAVASCRIPT -->
        @include("components.admin._metaScript")

        @yield("javascript")
    </body>

</html>

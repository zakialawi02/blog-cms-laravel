<!doctype html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">

    <head>
        <meta charset="utf-8" />
        <title>@yield("title", config("app.name"))</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="@yield("meta_description", "") name="description" ">
        <meta content="" name="author" />


        @stack("css")

        <!-- Scripts -->
        @vite(["resources/css/app.css", "resources/js/app.js"])
        @vite(["resources/css/app-tailwind.css"])
    </head>

    <body>

        @yield("content")

        @stack("javascript")

    </body>

</html>

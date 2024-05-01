<!doctype html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">

    <head>
        <meta charset="utf-8" />
        <title>@yield("title", config("app.name"))</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="@yield("meta_description", "") name="description">
        <meta content="@yield("meta_author", "")" name="author">

        <meta property="og:title" content="@yield("og_title", config("app.name"))" />
        <meta property="og:type" content="@yield("og_type", "website")" />
        <meta property="og:url" content="@yield("og_url", url()->current())" />
        <meta property="og:description" content="@yield("og_description", config("app.name"))" />
        <meta property="og:image" content="@yield("og_image", asset("assets/img/favicon.png"))" />

        <meta name="robots" content="@yield("meta_robots", "index,follow")">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="shortcut icon" href="{{ asset("assets/img/favicon.png") }}" type="image/png">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.min.css" integrity="sha512-MqL4+Io386IOPMKKyplKII0pVW5e+kb+PI/I3N87G3fHIfrgNNsRpzIXEi+0MQC0sR9xZNqZqCYVcC61fL5+Vg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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

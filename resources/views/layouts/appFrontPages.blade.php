<!doctype html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">

    <head>
        <meta charset="utf-8" />
        <title>@yield("title", config("app.name"))</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="@yield("meta_description", "")" name="description">
        <meta content="@yield("meta_author", "")" name="author">
        <meta content="@yield("meta_keywords", "")" name="keywords">

        <meta property="og:title" content="@yield("og_title", config("app.name"))" />
        <meta property="og:type" content="@yield("og_type", "website")" />
        <meta property="og:url" content="@yield("og_url", url()->current())" />
        <meta property="og:description" content="@yield("og_description", config("app.name"))" />
        <meta property="og:image" content="@yield("og_image", asset("assets/img/favicon.png"))" />

        <meta name="robots" content="@yield("meta_robots", "index,follow")">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="shortcut icon" href="{{ asset("assets/img/favicon.png") }}" type="image/png">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.min.css" integrity="sha512-MqL4+Io386IOPMKKyplKII0pVW5e+kb+PI/I3N87G3fHIfrgNNsRpzIXEi+0MQC0sR9xZNqZqCYVcC61fL5+Vg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="//unpkg.com/grapesjs/dist/css/grapes.min.css">
        <script src="//unpkg.com/grapesjs"></script>

        @stack("css")

        <!-- Scripts -->
        <script src="https://cdn.tailwindcss.com"></script>
        @if ($page->isFullWidth == 1)
            @vite(["resources/css/app.css", "resources/js/app.js"])
            @vite(["resources/css/app-tailwind.css"])
        @endif

        <style>
            .lc {
                display: flex;
                justify-content: center;
                align-items: center;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgb(232, 232, 232);
                z-index: 1;
            }

            .spn {
                width: 50px;
                padding: 8px;
                aspect-ratio: 1;
                border-radius: 50%;
                background: #196cca;
                --_m:
                    conic-gradient(#0000 10%, #000),
                    linear-gradient(#000 0 0) content-box;
                -webkit-mask: var(--_m);
                mask: var(--_m);
                -webkit-mask-composite: source-out;
                mask-composite: subtract;
                animation: s3 1s infinite linear;
            }

            @keyframes s3 {
                to {
                    transform: rotate(1turn)
                }
            }
        </style>
    </head>

    <body>
        @if ($page->isFullWidth == 1)
            <!-- NAVBAR -->
            @include("components.front.navbar")
        @endif

        <!-- Loader -->
        <div id="lspn" class="lc">
            <div class="spn"></div>
        </div>

        @yield("content")

        @if ($page->isFullWidth == 1)
            <!-- Footer -->
            @include("components.front.footer")
        @endif

        <script>
            const projectId = '{{ $page->id }}';
            const loadProjectEndpoint = `{{ url('/admin/pages/${projectId}/load-project') }}`;
        </script>
        <script>
            $.ajax({
                type: "get",
                url: loadProjectEndpoint,
                dataType: "json",
                success: function(response) {
                    const projectData = response.data;
                    console.log(projectData);

                    const PAGE_CONTENTS = projectData.pages[0].frames[0].component;
                    const editor = grapesjs.init({
                        headless: true,
                    })
                    const components = editor.addComponents(PAGE_CONTENTS);
                    const html = components.map(cmp => cmp.toHTML()).join('');
                    console.log('Rendered HTML is ', html);
                    $("#gjs").append(html);
                },
                error: function(error) {
                    console.error(error);
                }
            });
        </script>
        <script>
            $(document).ready(function() {
                $('#lspn').remove();
            });
        </script>

        @stack("javascript")

    </body>

</html>

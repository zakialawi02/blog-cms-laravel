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

        @include("components.admin._metaHead")

        <style>
            @media (max-width: 768px) {
                #myTable {
                    display: block;
                    overflow-x: auto;
                    white-space: nowrap;
                }
            }
        </style>

        @stack("css")

        <!-- Scripts -->
        @vite(["resources/css/app.css", "resources/js/app.js"])
    </head>

    <body data-sidebar="dark">

        <!-- Begin page -->
        <div id="layout-wrapper">

            @include("components.admin._header")

            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!--- Sidemenu -->
                    @include("components.admin._sidemenu")
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">

                    <!-- Content -->
                    <!-- start page title -->
                    @yield("content")

                    <!-- Content Here -->


                    <!-- end page title -->

                </div>
                <!-- End Page-content -->


                @include("components.admin._footer")
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->


        <!-- JAVASCRIPT -->
        @include("components.admin._metaScript")

        <!-- Message Alert -->
        @include("components.admin._messageAlert")

        <!-- Delete Confirmation -->
        @include("components.admin._deleteConfirmation")

        @stack("javascript")
    </body>

</html>

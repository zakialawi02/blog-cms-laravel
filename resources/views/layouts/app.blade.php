<!doctype html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">

    <head>
        <meta charset="utf-8" />
        <title>@yield("title", config("app.name"))</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="@yield("meta_description", "") name="description" ">
        <meta content="" name="author" />

        @include("components.admin._metaHead")

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

      @stack("javascript")
    </body>

</html>

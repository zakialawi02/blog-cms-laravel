<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Dashboard page | Administrator</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="" name="description" />
        <meta content="" name="author" />

        @include("components.admin._metaHead")
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
                    <div class="container-fluid">

                        <!-- Content -->
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0">Starter page</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Utility</a></li>
                                            <li class="breadcrumb-item active">Starter page</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!-- Content Here -->


                        <!-- end page title -->

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->


                @include("components.admin._footer")
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->


        <!-- JAVASCRIPT -->
        @include("components.admin._metaScript")

    </body>

</html>

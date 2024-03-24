<!doctype html>
<html lang="en">

    <head>

        <head>
            <meta charset="utf-8" />
            <title>Dashboard page | Administrator</title>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta content="" name="description" />
            <meta content="" name="author" />

            @include("components.admin._metaHead")
        </head>

    </head>

    <body class="auth-body-bg">
        <div class="home-btn d-none d-sm-block">
            <a href="/"><i class="mdi mdi-home-variant h2 text-white"></i></a>
        </div>

        <div class="container-fluid p-0 bg-secondary">
            <div class="row no-gutters justify-content-center">

                <div class="col-lg-4 authentication-page-content p-4 d-flex align-items-center min-vh-100">

                    <div class="col bg-light">
                        <div class="text-center">
                            <div>
                                <a href="/" class="logo"><img src="assets/img/logo-dark.png" height="20" alt="logo"></a>
                            </div>

                            <h4 class="font-size-18 mt-3">Verify Email</h4>
                            <p class="text-muted">Verify your email address.</p>
                        </div>

                        <div class="p-2 mt-4">
                            <div class="alert alert-info mb-4" role="alert">A verification link has been sent to your email. Please check your inbox and click on the link to verify your email address.</div>

                            <form class="form-horizontal" method="post" action="">
                                @csrf

                                <div class="mt-4 text-center">
                                    <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Resend Verification Email</button>
                                </div>
                            </form>
                        </div>

                        <div class="mt-2 text-center">

                            <p class="mt-5">
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> © Zakialawi.my.id
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>



        <!-- JAVASCRIPT -->
        @include("components.admin._metaScript")

    </body>

</html>

<!doctype html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">

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
                            @if (session("status") == "verification-link-sent")
                                <div class="alert alert-success mb-4" role="alert">
                                    {{ __("A new verification link has been sent to the email address you provided during registration.") }}
                                </div>
                            @endif

                            <div class="alert alert-info mb-4" role="alert">A verification link has been sent to your email. Please check your inbox and click on the link to verify your email address.</div>

                            <div class="d-flex flex-row justify-content-center">
                                <form class="form-horizontal m-1" method="post" action="{{ route("verification.send") }}">
                                    @csrf

                                    <div class="mt-4 text-center">
                                        <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Resend Verification Email</button>
                                    </div>
                                </form>
                                <form class="form-horizontal m-1" method="post" action="{{ route("logout") }}">
                                    @csrf

                                    <div class="mt-4 text-center">
                                        <button class="btn btn-secondary w-md waves-effect waves-light" type="submit">Log Out</button>
                                    </div>
                                </form>
                            </div>
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

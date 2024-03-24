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

                            <h4 class="font-size-18 mt-3">Welcome Back !</h4>
                            <p class="text-muted">Sign in to continue.</p>
                        </div>

                        <div class="p-2 mt-4">
                            <form class="form-horizontal" method="post" action="">
                                @csrf

                                <div class="form-group auth-form-group-custom mb-3">
                                    <i class="ri-user-2-line auti-custom-input-icon"></i>
                                    <label for="username">Username/Email</label>
                                    <input type="text" class="form-control" name="username" id="username" placeholder="Enter username/email" autofocus="on">
                                </div>

                                <div class="form-group auth-form-group-custom mb-3">
                                    <i class="ri-lock-2-line auti-custom-input-icon"></i>
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter password">
                                </div>

                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customControlInline">
                                    <label class="custom-control-label" for="customControlInline">Remember me</label>
                                </div>

                                <div class="mt-4 text-center">
                                    <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Log In</button>
                                </div>

                                <div class="mt-4 text-center">
                                    <a href="auth-recoverpw.html" class="text-muted"><i class="mdi mdi-lock mr-1"></i> Forgot your password?</a>
                                </div>
                            </form>
                        </div>

                        <div class="mt-2 text-center">
                            <p>Don't have an account ? <a href="auth-register.html" class="font-weight-medium text-primary"> Register </a> </p>

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
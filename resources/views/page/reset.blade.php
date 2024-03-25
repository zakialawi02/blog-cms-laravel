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

                    <div class="col bg-light rounded-lg">
                        <div class="text-center">
                            <div>
                                <a href="/" class="logo"><img src="assets/img/logo-dark.png" height="20" alt="logo"></a>
                            </div>

                            <h4 class="font-size-18 mt-3">Reset Password</h4>
                            <p class="text-muted">Reset your password.</p>
                        </div>

                        <div class="p-2 mt-4">

                            <form class="form-horizontal" method="post" action="{{ route("password.store") }}">
                                @csrf

                                <!-- Password Reset Token -->
                                <input type="hidden" name="token" value="{{ $request->route("token") }}">

                                <div class="form-group auth-form-group-custom mb-3">
                                    <i class="ri-mail-line auti-custom-input-icon"></i>
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" value="{{ old("email") }}"placeholder="Enter email" required>
                                    @error("email")
                                        <span class="text-danger" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group auth-form-group-custom mb-3">
                                    <i class="ri-lock-2-line auti-custom-input-icon"></i>
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter password" required>
                                    @error("password")
                                        <span class="text-danger" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group auth-form-group-custom mb-3">
                                    <i class="ri-lock-2-line auti-custom-input-icon"></i>
                                    <label for="password_confirmation">Confirm Password</label>
                                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" required>
                                </div>

                                <div class="mt-4 text-center">
                                    <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Reset Password</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>



        <!-- JAVASCRIPT -->
        @include("components.admin._metaScript")

    </body>

</html>

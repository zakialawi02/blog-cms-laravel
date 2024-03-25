@extends("layouts.guest")

@section("title", "Login | zakialawi")
@section("meta_description", "isi disini")

@section("css")
    {{-- code here --}}
@endsection

@section("content")
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
                    @if (session("status"))
                        <div class="alert alert-success mb-4" role="alert">
                            {{ session("status") }}
                        </div>
                    @endif

                    <form class="form-horizontal" method="post" action="{{ route("login") }}">
                        @csrf

                        <div class="form-group auth-form-group-custom mb-3">
                            <i class="ri-user-2-line auti-custom-input-icon"></i>
                            <label for="id_user">Email/Username</label>
                            <input type="text" class="form-control" name="id_user" id="id_user" value="{{ old("id_user") }}" placeholder="Enter email" autofocus>
                            @error("id_user")
                                <span class="text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="form-group auth-form-group-custom mb-3">
                            <i class="ri-lock-2-line auti-custom-input-icon"></i>
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password" value="{{ old("password") }}" placeholder="Enter password">
                            @error("password")
                                <span class="text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="remember_me" name="remember">
                            <label class="custom-control-label" for="remember_me">Remember me</label>
                        </div>

                        <div class="mt-4 text-center">
                            <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Log In</button>
                        </div>

                        <div class="mt-4 text-center">
                            <a href="{{ route("password.request") }}" class="text-muted"><i class="mdi mdi-lock mr-1"></i> Forgot your password?</a>
                        </div>
                    </form>
                </div>

                <div class="mt-2 text-center">
                    <p>Don't have an account ? <a href="{{ route("register") }}" class="font-weight-medium text-primary"> Register </a> </p>

                    <p class="mt-5">
                        <script>
                            document.write(new Date().getFullYear())
                        </script> © Zakialawi.my.id
                    </p>
                </div>
            </div>

        </div>
    </div>
@endsection

@section("javascript")

    <script>
        // code here
    </script>
@endsection

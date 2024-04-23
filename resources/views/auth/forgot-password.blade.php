@extends("layouts.guest")

@section("title", "Forgot Password | zakialawi")
@section("meta_description", "Forgot password to the zakialawi.my.id website")
@section("meta_author", "zakialawi")

@section("og_title", "Forgot Password Page | zakialawi.my.id")
@section("og_description", "Forgot Password to the zakialawi.my.id website")

@section("css")
    {{-- code here --}}
@endsection

@section("content")
    <div class="row no-gutters justify-content-center">

        <div class="p-4 col-lg-4 authentication-page-content d-flex align-items-center min-vh-100">

            <div class="rounded-lg col bg-light">
                <div class="text-center">
                    <div>
                        <a href="/" class="logo"><img src="assets/img/logo-dark.png" height="20" alt="logo"></a>
                    </div>

                    <h4 class="mt-3 font-size-18">Forgot Password</h4>
                    <p class="text-muted">Reset your password.</p>
                </div>

                <div class="p-2 mt-4">
                    @if (session("status"))
                        <div class="mb-4 alert alert-success" role="alert">
                            {{ session("status") }}
                        </div>
                    @endif

                    <div class="mb-4 alert alert-success" role="alert">Enter your Email and instructions will be sent to you!</div>

                    <form class="form-horizontal" method="post" action="{{ route("password.email") }}">
                        @csrf

                        <div class="mb-4 form-group auth-form-group-custom">
                            <i class="ri-mail-line auti-custom-input-icon"></i>
                            <label for="useremail">Email</label>
                            <input type="email" class="form-control" id="useremail" name="email" placeholder="Enter email" />
                            @error("email")
                                <span class="text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="mt-4 text-center">
                            <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Reset</button>
                        </div>
                    </form>
                </div>

                <div class="mt-2 text-center">
                    <p>Already have an account ? <a href="{{ route("login") }}" class="font-weight-medium text-primary"> Login </a> </p>

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

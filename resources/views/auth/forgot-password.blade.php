@extends("layouts.guest")

@section("title", "Forgot Password | zakialawi")
@section("meta_description", "isi disini")

@section("css")
    {{-- code here --}}
@endsection

@section("content")
    <div class="row no-gutters justify-content-center">

        <div class="col-lg-4 authentication-page-content p-4 d-flex align-items-center min-vh-100">

            <div class="col bg-light rounded-lg">
                <div class="text-center">
                    <div>
                        <a href="/" class="logo"><img src="assets/img/logo-dark.png" height="20" alt="logo"></a>
                    </div>

                    <h4 class="font-size-18 mt-3">Forgot Password</h4>
                    <p class="text-muted">Reset your password.</p>
                </div>

                <div class="p-2 mt-4">
                    @if (session("status"))
                        <div class="alert alert-success mb-4" role="alert">
                            {{ session("status") }}
                        </div>
                    @endif

                    <div class="alert alert-success mb-4" role="alert">Enter your Email and instructions will be sent to you!</div>

                    <form class="form-horizontal" method="post" action="{{ route("password.email") }}">
                        @csrf

                        <div class="form-group auth-form-group-custom mb-4">
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

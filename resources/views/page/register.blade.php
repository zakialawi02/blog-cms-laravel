@extends("page.AUTH")

@section("title", "Register | zakialawi")
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

                    <h4 class="font-size-18 mt-3">Register account</h4>
                    <p class="text-muted">Get your free access account now.</p>
                </div>

                <div class="p-2 mt-4">
                    <form class="form-horizontal" method="post" action="{{ route("register") }}" autocomplete="off">
                        @csrf

                        <div class="form-group auth-form-group-custom mb-3">
                            <i class="ri-user-2-line auti-custom-input-icon"></i>
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ old("name") }}" placeholder="Enter your Name" required autofocus="on">
                        </div>

                        <div class="form-group auth-form-group-custom mb-3">
                            <i class="ri-mail-line auti-custom-input-icon"></i>
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" value="{{ old("email") }}"placeholder="Enter email" required>
                        </div>

                        <div class="form-group auth-form-group-custom mb-3">
                            <i class="ri-lock-2-line auti-custom-input-icon"></i>
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Enter password" required>
                        </div>

                        <div class="form-group auth-form-group-custom mb-3">
                            <i class="ri-lock-2-line auti-custom-input-icon"></i>
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" required>
                        </div>


                        <div class="text-center">
                            <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Register</button>
                        </div>

                        <div class="mt-4 text-center">
                            <p class="mb-0">By registering you agree to the <a href="#" class="text-primary">Terms of Use</a></p>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // code here
    </script>
@endsection

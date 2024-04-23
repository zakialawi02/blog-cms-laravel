@extends("layouts.guest")

@section("title", "Reset Password | zakialawi")
@section("meta_description", "Reset password to the zakialawi.my.id website")
@section("meta_author", "zakialawi")

@section("og_title", "Reset Password Page | zakialawi.my.id")
@section("og_description", "Reset password to the zakialawi.my.id website")

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

                    <h4 class="mt-3 font-size-18">Reset Password</h4>
                    <p class="text-muted">Reset your password.</p>
                </div>

                <div class="p-2 mt-4">

                    <form class="form-horizontal" method="post" action="{{ route("password.store") }}">
                        @csrf

                        <!-- Password Reset Token -->
                        <input type="hidden" name="token" value="{{ $request->route("token") }}">

                        <div class="mb-3 form-group auth-form-group-custom">
                            <i class="ri-mail-line auti-custom-input-icon"></i>
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" value="{{ old("email") }}"placeholder="Enter your email" required>
                            @error("email")
                                <span class="text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3 form-group auth-form-group-custom">
                            <i class="ri-lock-2-line auti-custom-input-icon"></i>
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Enter new password" required>
                            @error("password")
                                <span class="text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3 form-group auth-form-group-custom">
                            <i class="ri-lock-2-line auti-custom-input-icon"></i>
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Confirm new Password" required>
                        </div>

                        <div class="mt-4 text-center">
                            <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Reset Password</button>
                        </div>
                    </form>
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

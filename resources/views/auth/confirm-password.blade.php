@extends("layouts.guest")

@section("title", "Unlock | zakialawi")
@section("meta_description", "Confirm password to the zakialawi.my.id website")
@section("meta_author", "zakialawi")

@section("og_title", "Confirm Password Page | zakialawi.my.id")
@section("og_description", "Confirm password to the zakialawi.my.id website")

@section("css")
    {{-- code here --}}
@endsection

@section("content")
    <div class="row no-gutters justify-content-center">

        <div class="p-4 col-lg-4 authentication-page-content d-flex align-items-center min-vh-100">

            <div class="col bg-light">
                <div class="text-center">
                    <div>
                        <a href="/" class="logo"><img src="assets/img/logo-dark.png" height="20" alt="logo"></a>
                    </div>

                    <h4 class="mt-3 font-size-18">Lock screen</h4>
                    <p class="text-muted">Enter your password to unlock the screen!</p>
                </div>

                <div class="p-2 mt-4">
                    @if (session("status"))
                        <div class="mb-4 alert alert-success" role="alert">
                            {{ session("status") }}
                        </div>
                    @endif

                    <form class="form-horizontal" action="{{ route("password.confirm") }}">
                        @csrf

                        <div class="mb-4 form-group auth-form-group-custom">
                            <i class="ri-lock-2-line auti-custom-input-icon"></i>
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password" value="{{ old("password") }}" placeholder="Enter password">
                            @error("password")
                                <span class="text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="mt-4 text-center">
                            <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Confirm</button>
                        </div>
                    </form>
                </div>

                <div class="mt-2 text-center">
                    <form action="{{ route("logout") }}" method="POST">
                        @csrf
                        <p>Not you ?
                            <button type="submit" class="font-weight-medium text-primary" style="background:none;border:none;padding:0;">Logout</button>
                        </p>
                    </form>




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

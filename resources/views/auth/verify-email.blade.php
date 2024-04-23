@extends("layouts.guest")

@section("title", "Verify your email | zakialawi")
@section("meta_description", "Verify email to the zakialawi.my.id website")
@section("meta_author", "zakialawi")

@section("og_title", "Verify Email Page | zakialawi.my.id")
@section("og_description", "Verify email to the zakialawi.my.id website")

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

                    <h4 class="mt-3 font-size-18">Verify Email</h4>
                    <p class="text-muted">Verify your email address.</p>
                </div>

                <div class="p-2 mt-4">
                    @if (session("status") == "verification-link-sent")
                        <div class="mb-4 alert alert-success" role="alert">
                            {{ __("A new verification link has been sent to the email address you provided during registration.") }}
                        </div>
                    @endif

                    <div class="mb-4 alert alert-info" role="alert">A verification link has been sent to your email. Please check your inbox and click on the link to verify your email address.</div>

                    <div class="flex-row d-flex justify-content-center">
                        <form class="m-1 form-horizontal" method="post" action="{{ route("verification.send") }}">
                            @csrf

                            <div class="mt-4 text-center">
                                <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Resend Verification Email</button>
                            </div>
                        </form>
                        <form class="m-1 form-horizontal" method="post" action="{{ route("logout") }}">
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
@endsection

@section("javascript")

    <script>
        // code here
    </script>
@endsection

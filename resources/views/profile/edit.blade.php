@extends("layouts.app")

@section("title", "Edit Profile | zakialawi")
@section("meta_description", "isi disini")

@section("css")
    {{-- code here --}}
@endsection

@section("content")

    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">{{ __("Profile") }}</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                            <li class="breadcrumb-item active">{{ __("Profile") }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="card p-3">
            <h4>{{ __("Profile Information") }}</h4>
            <p>{{ __("Update your account's profile information and email address") }}.</p>

            <form id="send-verification" method="post" action="{{ route("verification.send") }}">
                @csrf
            </form>

            <div class="row">
                <div class="col-md-6">
                    <form class="mt-2 p-2" method="post" action="{{ route("profile.update") }}">
                        @csrf
                        @method("patch")

                        <div class="form-group">
                            <label for="name">E-Mail</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter your name" value="{{ old("name", $user->name) }}" required />
                            @error("name")
                                <span class="text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Name</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter a valid e-mail" value="{{ old("email", $user->email) }}" required />
                            @error("email")
                                <span class="text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                            <div>
                                <p class="text-sm mt-2">
                                    {{ __("Your email address is unverified.") }}

                                    <button form="send-verification" class="btn btn-sm btn-info">{{ __("Click here to re-send the verification email.") }}</button>
                                </p>

                                @if (session("status") === "verification-link-sent")
                                    <p class="mt-2 text-sm text-success">
                                        {{ __("A new verification link has been sent to your email address.") }}
                                    </p>
                                @endif
                            </div>
                        @endif

                        <div class="d-flex flex-row align-items-baseline ">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">save</button>
                            @if (session("status") === "profile-updated")
                                <p class="text-sm text-muted p-2">{{ __("Saved.") }}</p>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="card p-3">
            <h4> {{ __("Update Password") }}</h4>
            <p>{{ __("Ensure your account is using a long, random password to stay secure") }}.</p>

            <div class="row">
                <div class="col-md-6">
                    <form class="mt-2 p-2" method="post" action="{{ route("password.update") }}">
                        @csrf
                        @method("put")

                        <div class="form-group">
                            <label for="update_password_current_password">Current Password</label>
                            <input type="password" class="form-control" name="current_password" id="update_password_current_password" placeholder="Current password" required />
                            @if ($errors->updatePassword->has("current_password"))
                                <p class="text-sm text-danger p-2">{{ __("Incorrect Password!") }}</p>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="update_password_password">New password</label>
                            <input type="password" class="form-control" name="password" id="update_password_password" placeholder="New password" required />
                            @if ($errors->updatePassword->has("password"))
                                <p class="text-sm text-danger p-2">{{ __("The password field must be at least 8 characters") }}</p>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="update_password_password_confirmation">Confirm new password</label>
                            <input type="password" class="form-control" name="password_confirmation" id="update_password_password_confirmation" placeholder="Confirm new password" required />
                            @if ($errors->updatePassword->has("password_confirmation"))
                                <p class="text-sm text-danger p-2">{{ __("Password does not match") }}</p>
                            @endif
                        </div>


                        <div class="d-flex flex-row align-items-baseline ">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">save</button>
                            @if (session("status") === "password-updated")
                                <p class="text-sm text-muted p-2">{{ __("Saved.") }}</p>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="card p-3">
            <h4> {{ __("Delete Account") }}</h4>
            <p>{{ __("Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain") }}.</p>

            <div class="row">
                <div class="col-md-6">

                    <!-- Modal -->
                    <div class="modal fade" id="confirm-user-deletion" tabindex="-1" aria-labelledby="confirm-user-deletionLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">{{ __("Confirm account deletion") }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="post" action="{{ route("profile.destroy") }}" class="p-6">
                                    @csrf
                                    @method("delete")

                                    <div class="modal-body">
                                        <p><strong>{{ __("Are you sure you want to delete your account?") }}</strong></p>
                                        <p>{{ __("Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account") }}</p>

                                        <div class="form-group">
                                            <label for="password">Your password</label>
                                            <input type="password" class="form-control" name="password" id="password" placeholder="Your password" required />
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> {{ __("Cancel") }}</button>
                                        <button type="submit" class="btn btn-primary"> {{ __("Delete Account") }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger " data-toggle="modal" data-target="#confirm-user-deletion">
                        {{ __("Delete Account") }}
                    </button>

                    @if ($errors->userDeletion->has("password"))
                        <p class="text-sm text-danger p-2">{{ __("Failed to delete account. Incorrect Password!") }}</p>
                    @endif

                </div>
            </div>
        </div>
        <!-- end row -->
    </div>

@endsection

@section("javascript")

    <script>
        // code here
    </script>
@endsection

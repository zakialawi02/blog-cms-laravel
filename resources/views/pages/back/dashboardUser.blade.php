@extends("layouts.app")

@section("title", ($data["title"] ?? "") . " • Dashboard | zakialawi")
@section("meta_description", "Dashboard of zakialawi.my.id website")
@section("meta_author", "zakialawi")

@section("og_title", "Dashboard | zakialawi.my.id")
@section("og_description", "Dashboard of zakialawi.my.id website")

@push("css")
    {{-- code here --}}
@endpush

@section("content")
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">{{ __($data["title"] ?? "Dashboard") }}</h4>

                    <div class="page-title-right">
                        <ol class="m-0 breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Utility</a></li>
                            <li class="breadcrumb-item active">Starter page</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->
    </div>

    <div class="mb-3">
        <h2>
            Welcome {{ Auth::user()->name }}, {{ "@" . Auth::user()->username }}
        </h2>
    </div>

    <div class="p-3 card">
        <div class="">
            <h4>My Comments</h4>
        </div>
        <p>Total of my comments : {{ $myComments }}</p>
        <a href="{{ route("admin.mycomments.index") }}">View My Comments More</a>
    </div>

    <div class="p-3 card">
        <div class="">
            <h4>Become a Contributor</h4>
        </div>

        @if (session()->has("message"))
            <div class="alert alert-success">
                <span>{{ session("message") }}</span>
            </div>
        @endif

        @if ($my === null || $my->valid_code_until < now())
            <div class="">
                <p>Want to be a part of our community and contribute as a writer? Click the button below to join our team!</p>
                <div class="d-flex justify-content-center">
                    <form action="{{ route("admin.requestsContributors") }}" method="POST">
                        @csrf
                        @method("POST")

                        <button type="submit" class="btn btn-primary">Join as Contributor/Writer</button>
                    </form>
                </div>
            </div>
        @elseif ($my !== null && $my->valid_code_until > now())
            <div class="d-flex justify-content-center">
                <div class="col ">
                    <div class="text-center">
                        <h4 class="mt-3 font-size-18">Enter your code to confirm your request to become a contributor</h4>
                        <p class="text-muted">We've sent a code to your mail, {{ auth()->user()->email }}</p>
                    </div>

                    <div class="p-2 mt-4">
                        @if (session("status"))
                            <div class="mb-4 alert alert-success" role="alert">
                                {{ session("status") }}
                            </div>
                        @endif

                        <form class="form-horizontal" method="POST" action="{{ route("admin.confirmCodeContributor") }}">
                            @csrf
                            @method("POST")

                            <div class="mx-auto mb-4 form-group col-4">
                                <input type="code" class="form-control" name="code" id="code" value="{{ old("code") }}" placeholder="Enter code">
                                @error("code")
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
                </div>
            </div>
        @endif

    </div>

    <div class="p-3 card">
        <div class="">
            <h4>Coming Soon</h4>
        </div>
        <p>Coming Soon new features</p>
    </div>

@endsection

@push("javascript")
    <script>
        // code here
    </script>
@endpush

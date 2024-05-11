@extends("layouts.app")

@section("title", ($data["title"] ?? "") . " • Dashboard | zakialawi")
@section("meta_description", "isi disini")
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
    </div>

    <div class="p-3 card">
        <div class="">
            <h4>Become a Contributor</h4>
        </div>
        <p>Want to be a part of our community and contribute as a writer? Click the button below to join our team!</p>
        <div class="d-flex justify-content-center">
            <a href="#" class="btn btn-primary">Join as Author</a>
        </div>
    </div>

@endsection

@push("javascript")
    <!-- Message Alert -->
    @include("components.admin._messageAlert")

    <script>
        // code here
    </script>
@endpush

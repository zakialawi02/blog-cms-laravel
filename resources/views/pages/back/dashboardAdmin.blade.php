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

    <div class="row">
        <div class="col-sm-6 col-md-3">
            <div class="card">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="mb-0 card-title">Total My Posts</h4>
                        <p class="card-text">44 posts</p>
                    </div>
                    <div>
                        <i class="ri-archive-stack-fill display-1 text-primary" style="font-size: 3rem;"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="card">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="mb-0 card-title">My Posts Published</h4>
                        <p class="card-text">44 Posts</p>
                    </div>
                    <div>
                        <i class="ri-mac-line display-1 text-success" style="font-size: 3rem;"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="card">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="mb-0 card-title">Total My Comments</h4>
                        <p class="card-text">44 comments</p>
                    </div>
                    <div>
                        <i class="ri-message-2-fill display-1 text-info" style="font-size: 3rem;"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="card">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="mb-0 card-title">Visitors</h4>
                        <p class="card-text">44 posts</p>
                    </div>
                    <div>
                        <i class="ri-bar-chart-grouped-fill display-1 text-danger" style="font-size: 3rem;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (Auth::user()->role == "admin")
        <div class="p-3 card">
            <div class="">
                <h4>Menu Admin</h4>
            </div>
            <p>Menu ini akan tampil jika rolenya 'admin'</p>
        </div>
    @elseif (Auth::user()->role == "writer")
        <div class="p-3 card">
            <div class="">
                <h4>Menu Writer</h4>
            </div>
            <p>Menu ini akan tampil jika rolenya 'writer'</p>
        </div>
    @elseif (Auth::user()->role == "user")
        <div class="p-3 card">
            <div class="">
                <h4>Become a Contributor</h4>
            </div>
            <p>Want to be a part of our community and contribute as a writer? Click the button below to join our team!</p>
            <div class="d-flex justify-content-center">
                <a href="#" class="btn btn-primary">Join as Author</a>
            </div>
        </div>
    @endif

@endsection

@push("javascript")
    <script>
        // code here
    </script>
@endpush

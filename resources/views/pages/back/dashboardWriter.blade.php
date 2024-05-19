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

                    <!-- Breadcrumb -->
                    @include("components.admin.breadcrumb")

                </div>
            </div>
        </div>
        <!-- end page title -->
    </div>

    @if (session()->has("message"))
        <div class="alert alert-success">
            <span>{{ session("message") }}</span>
        </div>
    @endif

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
                        <p class="card-text">{{ $myPosts }} posts</p>
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
                        <p class="card-text">{{ $myPostsPublished }} Posts</p>
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
                        <p class="card-text">{{ $myComments }} comments</p>
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
                        <p class="card-text">{{ $visitors }} posts</p>
                    </div>
                    <div>
                        <i class="ri-bar-chart-grouped-fill display-1 text-danger" style="font-size: 3rem;"></i>
                    </div>
                </div>
            </div>
        </div>
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

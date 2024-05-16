@extends("layouts.app")

@section("title", ($data["title"] ?? "") . " • Dashboard | zakialawi")
@section("meta_description", "List of all posts on the zakialawi.my.id website")
@section("meta_author", "zakialawi")

@section("og_title", "All Posts • Dashboard | zakialawi.my.id")
@section("og_description", "List of all posts on the zakialawi.my.id website")

@push("css")
    {{-- code here --}}
@endpush

@section("content")
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">{{ __($data["title"] ?? "") }}</h4>

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

    <div class="card">
        <div class="px-3 pt-3">
            <p class="text-muted">If you upload in shared folder, your files will be accessible to everyone</p>
        </div>

        <div class="col-md-12">
            <iframe src="/admin/laravel-filemanager" style="width: 100%; height: 520px; overflow: hidden; border: none;" loading="lazy"></iframe>
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

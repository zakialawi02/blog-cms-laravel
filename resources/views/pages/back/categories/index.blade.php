@extends("layouts.app")

@section("title", ($data["title"] ?? "") . " • Dashboard | zakialawi")
@section("meta_description", "List of all categories on the zakialawi.my.id website")
@section("meta_author", "zakialawi")


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

    <div class="p-3 card">

        <div class="px-2 mb-3 d-flex justify-content-between align-items-center">
            <h3>{{ __("Categories") }}</h3>
            <a href="{{ route("admin.categories.create") }}" class="btn btn-primary"><i class="ri-add-line"></i> Add Categories</a>
        </div>


        <div class="">
            <table class="table table-hover table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Category</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $category)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $category->category }}</td>
                            <td><i class="ri-news-line text-primary"></i> <a href="{{ route("article.category", $category->slug) }}">{{ $category->slug }}</a><i class="ri-external-link-line"></i></td>
                            <td>
                                <a href="{{ route("admin.categories.edit", $category->slug) }}" class="btn btn-sm btn-success"><i class="ri-pencil-line"></i></a>
                                <form action="{{ route("admin.categories.destroy", $category->slug) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="btn btn-sm btn-danger show-confirm-delete"><i class="ri-delete-bin-6-line"></i></button>
                                </form>
                            </td>
                    </tr>@empty
                        <tr>
                            <td colspan="4" class="text-center">No Categories</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
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

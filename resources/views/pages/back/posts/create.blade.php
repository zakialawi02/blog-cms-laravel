@extends("layouts.app")

@section("title", ($data["title"] ?? "") . " • Dashboard | zakialawi")
@section("meta_description", "isi disini")
@section("meta_author", "zakialawi")

@section("og_title", "Create Posts • Dashboard | zakialawi.my.id")
@section("og_description", "Create posts on the zakialawi.my.id website")

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
            <h3>{{ __("Create Posts") }}</h3>

        </div>
        <div class="">
            <form action="{{ route("admin.posts.store") }}" method="post">
                @csrf
                @method("PUT")

                <div class="form-group">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old("title") }}" placeholder="Title" required>
                    @error("title")
                        <p class="text-sm text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="category_id">Categoy</label>
                    <select class="form-control" id="category_id" name="category_id" required>
                        <option value="">Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category }}</option>
                        @endforeach
                    </select>
                    @error("category_id")
                        <p class="text-sm text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="body">Content</label>
                    <textarea class="form-control" id="content" name="content" required>{{ old("content") }}</textarea>
                    @error("content")
                        <p class="text-sm text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>

    </div>



@endsection


@push("javascript")
    @vite(["resources/js/wyswyg.js"])
    <script>
        //
    </script>
@endpush

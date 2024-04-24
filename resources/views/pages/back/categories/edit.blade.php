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

    <div class="p-3 card">

        <form action="{{ route("admin.categories.update", $category->slug) }}" method="post">
            @csrf
            @method("put")

            <div class="form-group">
                <label for="category">Category Name</label>
                <input type="text" name="category" id="category" class="form-control" value="{{ $category->category, old("category") }}" autofocus required>
                @error("category")
                    <p class="text-sm text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="slug">Category Slug / url</label>
                <div class="input-group">
                    <input type="text" name="slug" id="slug" class="form-control" value="{{ $category->slug, old("slug") }}" readonly required>
                    <div class="input-group-append">
                        <button type="button" class="btn btn-outline-secondary ri-pencil-fill" id="edit-slug">
                        </button>
                    </div>
                </div>
                @error("slug")
                    <p class="text-sm text-danger">{{ $message }}</p>
                @enderror
            </div>


            <button type="submit" class="btn btn-primary">Save</button>
        </form>

    </div>



@endsection

@push("javascript")
    <script>
        $("#edit-slug").click(function(e) {
            const slug = document.getElementById("slug");
            slug.readOnly = !slug.readOnly;
            $("#edit-slug").toggleClass("ri-pencil-fill");
            $("#edit-slug").toggleClass("ri-close-fill");
        })

        $("#category").keyup(function(e) {
            const category = $("#category").val();
            console.log(category);
            $.ajax({
                type: "post",
                url: `{{ route("admin.categories.generateSlug") }}`,
                data: {
                    category,
                    _token: "{{ csrf_token() }}"
                },
                dataType: "json",
                success: function(response) {
                    $("#slug").val(response.slug);
                },
                error: function(error) {

                }
            });
        });
    </script>
@endpush

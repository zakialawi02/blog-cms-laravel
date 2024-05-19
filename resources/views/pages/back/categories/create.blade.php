@extends("layouts.app")

@section("title", ($data["title"] ?? "") . " • Dashboard | zakialawi")
@section("meta_description", "isi disini")
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

                    <!-- Breadcrumb -->
                    @include("components.admin.breadcrumb")

                </div>
            </div>
        </div>
        <!-- end page title -->
    </div>

    <div class="p-3 card">

        <form action="{{ route("admin.categories.store") }}" id="form-category" method="post">
            @csrf
            @method("post")

            <div class="form-group">
                <label for="category">Category Name</label>
                <input type="text" name="category" id="category" class="form-control" value="{{ old("category") }}" autofocus required>
                @error("category")
                    <p class="text-sm text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="slug">Category Slug / url</label>
                <div class="input-group">
                    <input type="text" name="slug" id="slug" class="form-control" value="{{ old("slug") }}" readonly required>
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


        const debounce = (fn, delay = 500) => {
            let timer;
            return function(...args) {
                clearTimeout(timer);
                timer = setTimeout(() => {
                    fn.apply(this, args);
                }, delay);
            };
        };

        $("#category").on("input", debounce(function(e) {
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
        }));

        $(document).ready(function() {
            let formChanged = false;
            document.getElementById('form-category').addEventListener('change', () => {
                formChanged = true;
            });
            window.addEventListener('beforeunload', function(e) {
                if (!formChanged) return undefined;

                // Cancel the event as per the standard.
                e.preventDefault();
                // Chrome requires returnValue to be set.
                e.returnValue = '';
                return 'Are you sure you want to leave? Changes you made may not be saved.';
            });

            document.getElementById('form-category').addEventListener('submit', function(event) {
                formChanged = false;
            });
        });
    </script>
@endpush

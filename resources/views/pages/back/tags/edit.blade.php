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

        <form action="{{ route("admin.tags.update", $tag->slug) }}" id="form-tag" method="post">
            @csrf
            @method("put")

            <div class="form-group">
                <label for="tag_name">Tag Name</label>
                <input type="text" name="tag_name" id="tag_name" class="form-control" value="{{ old("tag_name", $tag->tag_name) }}" autofocus required>
                @error("tag_name")
                    <p class="text-sm text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="slug">Tag Slug / url</label>
                <div class="input-group">
                    <input type="text" name="slug" id="slug" class="form-control" value="{{ old("slug", $tag->slug) }}" readonly required>
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

        $("#tag_name").on("input", debounce(function(e) {
            const tag = $("#tag_name").val();

            $.ajax({
                type: "post",
                url: `{{ route("admin.tags.generateSlug") }}`,
                data: {
                    tag,
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
            document.getElementById('form-tag').addEventListener('change', () => {
                if (!formChanged) {
                    formChanged = true;
                }
            });
            window.addEventListener('beforeunload', function(e) {
                if (!formChanged) return undefined;
                // Cancel the event as per the standard.
                e.preventDefault();
                // Chrome requires returnValue to be set.
                e.returnValue = '';
                return 'Are you sure you want to leave? Changes you made may not be saved.';
            });

            document.getElementById('form-tag').addEventListener('submit', function(event) {
                formChanged = false;
            });
        });
    </script>
@endpush

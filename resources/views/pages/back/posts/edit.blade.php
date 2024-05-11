@extends("layouts.app")

@section("title", ($data["title"] ?? "") . " • Dashboard | zakialawi")
@section("meta_description", "isi disini")
@section("meta_author", "zakialawi")


@push("css")
    <link rel="stylesheet" href="{{ asset("assets/css/magicsuggest.css") }}">
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

    <div class="">
        <form action="{{ route("admin.posts.update", $post->slug) }}" id="post-form" method="post" enctype="multipart/form-data">
            @csrf
            @method("PUT")

            <div class="row">
                <div class="col-md-8">
                    <div class="p-3 card">
                        <div class="form-group">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old("title", $post->title) }}" placeholder="Title" required>
                            @error("title")
                                <p class="text-sm text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="category_id">Categoy</label>
                            <select class="form-control" id="category_id" name="category_id">
                                <option value="">-- Select Category --</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ old("category_id", $post->category_id) == $category->id ? "selected" : "" }}>{{ $category->category }}</option>
                                @endforeach
                            </select>
                            @error("category_id")
                                <p class="text-sm text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="excerpt" class="form-label">Excerpt/Summary/Intro</label>
                            <textarea class="form-control" id="excerpt" name="excerpt" rows="5">{{ old("excerpt", $post->excerpt) }}</textarea>
                            @error("excerpt")
                                <p class="text-sm text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="tags" class="form-label">Tags</label>
                            <input type="text" class="form-control" id="tags" name="tags[]" value="{{ json_encode(old("tags", $articleTags)) }}" placeholder="Type or click here or Type then press enter to create new tag">
                            @error("tags")
                                <p class="text-sm text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-3 card">
                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <div class="input-group">
                                <input type="text" name="slug" id="slug" class="form-control" value="{{ old("slug", $post->slug) }}" readonly required>
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-outline-secondary ri-pencil-fill" id="edit-slug">
                                    </button>
                                </div>
                            </div>
                            @error("slug")
                                <p class="text-sm text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="published_at" class="form-label">Publish At <span class="text-muted">*by default immediately</span></label>
                            <input type="datetime-local" class="form-control" id="published_at" name="published_at" value="{{ old("published_at", $post->published_at) }}">
                            @error("published_at")
                                <p class="text-sm text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="user_id">Author</label>
                            <select class="form-control" id="user_id" name="user_id">
                                <option value="{{ Auth::user()->id }}" {{ old("user_id", $post->user_id) == Auth::user()->id ? "selected" : "" }}>{{ Auth::user()->username }}</option>
                            </select>
                            @error("status")
                                <p class="text-sm text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="cover" class="form-label">Featured Image</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="cover" name="cover">
                                <label class="custom-file-label" for="cover">Choose file</label>
                            </div>
                            @if ($post->cover)
                                <div class="mt-2 preview-cover">
                                    <img src="{{ asset("storage/drive/" . $post->user->username . "/img/" . $post->cover) }}" alt="Featured Image" style="width: 300px; height: 200px; object-fit: cover">
                                </div>
                            @endif
                            <div class="mt-2 preview-cover"></div>
                            @error("cover")
                                <p class="text-sm text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-3 card">
                <div class="">

                    <div class="form-group">
                        <label for="body">Content</label>
                        @error("content")
                            <p class="text-sm text-danger">{{ $message }}</p>
                        @enderror
                        <textarea class="form-control" id="content" name="content">{{ old("content", $post->content) }}</textarea>
                    </div>

                </div>
            </div>

            <div class="py-3">
                <button type="submit" name="publish" class="btn btn-primary">Save and Publish</button>
                <button type="submit" name="unpublish" class="btn btn-secondary">Save Draft</button>
            </div>
        </form>

    </div>


@endsection


@push("javascript")
    @vite(["resources/js/wyswyg.js"])
    <script src="{{ asset("assets/js/magicsuggest.js") }}"></script>

    <script>
        $(document).ready(function() {
            let isSlugEdited = false;
            $("#edit-slug").click(function(e) {
                const slug = document.getElementById("slug");
                slug.readOnly = !slug.readOnly;
                $("#edit-slug").toggleClass("ri-pencil-fill");
                $("#edit-slug").toggleClass("ri-close-fill");
                isSlugEdited = true;
            })

            $("#title").change(function(e) {
                const title = $("#title").val();
                if (!isSlugEdited) {
                    generateSlug(title);
                }
            });

            function generateSlug(data) {
                $.ajax({
                    type: "post",
                    url: `{{ route("admin.posts.generateSlug") }}`,
                    data: {
                        data,
                        _token: "{{ csrf_token() }}"
                    },
                    dataType: "json",
                    success: function(response) {
                        $("#slug").val(response.slug);
                    },
                    error: function(error) {

                    }
                });
            }

            $("#cover").change(function(e) {
                const file = event.target.files[0];
                if (file) {
                    // Memastikan file adalah gambar
                    if (/^image\//i.test(file.type)) {
                        // Membuat FileReader untuk membaca file
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            // Setelah file dibaca, tampilkan pada div preview
                            const img = document.createElement('img');
                            img.src = e.target.result;
                            img.style.width = '300px';
                            img.style.maxHeight = '200px';
                            img.style.objectFit = 'cover';

                            // Membersihkan preview sebelumnya dan menambahkan yang baru
                            const preview = document.querySelector('.preview-cover');
                            preview.innerHTML = '';
                            preview.appendChild(img);
                        };
                        reader.readAsDataURL(file); // Membaca file sebagai data URL

                        // Update label untuk menampilkan nama file
                        document.querySelector('.custom-file-label').textContent = file.name.substr(0, 25) + (file.name.length > 25 ? '...' : '');
                    } else {
                        alert('Invalid file type. Please select an image.');
                    }
                } else {
                    // Clear the preview and reset the label if no file is chosen
                    document.querySelector('.preview-cover').innerHTML = '';
                    document.querySelector('.custom-file-label').textContent = 'Choose file';
                }
            });
        });

        $(document).ready(function() {
            let formChanged = false;
            document.getElementById('post-form').addEventListener('change', () => {
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

            document.getElementById('post-form').addEventListener('submit', function(event) {
                formChanged = false;
            });
        });


        const listTags = [
            @foreach ($tags as $tag)
                {
                    id: "{{ $tag->id }}",
                    name: "{{ $tag->tag_name }}"
                },
            @endforeach
        ];

        $(function() {
            const instance = $('#tags').magicSuggest({
                data: listTags,
                displayField: 'name',
                tooltipField: 'title',
                autoSelect: false,
                valueField: 'name',
                allowFreeEntries: true,
                maxSelection: 8,
                allowDuplicates: false,
                noSuggestionText: 'No suggestions, or enter for create new tag',
                placeholder: 'Type or click here or Type then press enter to create new tag',
            });
        });
    </script>
@endpush
